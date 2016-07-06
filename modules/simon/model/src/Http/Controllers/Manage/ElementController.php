<?php
namespace Simon\Model\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Model\Services\Element\Interfaces\ElementInterface;
use Simon\Model\Services\Model\Interfaces\ModelInterface;
use Simon\Model\Services\Field\Interfaces\FieldInterface;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Simon\Model\Fields\Factory;
use Illuminate\Http\Request;
use Simon\Model\Forms\Element\AdapterElementForm;
use Simon\Model\Fields\Factory\View;
use Simon\Model\Fields\Factory\Database;
use App\Exceptions\AppException;
use Simon\Model\Fields\Factory\Select;
use Simon\Model\Services\Element\ElementStoreService;
use Illuminate\Database\Eloquent\Collection;
use Simon\Model\Services\Element\ElementUpdateService;
use Simon\Model\Services\Element\ElementService;
class ElementController extends Controller
{
	/**
	 * 
	 * @var string
	 * @author root
	 */
	protected $view = 'model::manage.element.'; 
	
	/**
	 * 
	 * @var ModelInterface
	 * @author root
	 */
	protected $modelService = null;
	
	/**
	 * @var array $views
	 */
	protected $views = [];
	
	/**
	 * 
	 * @var integer
	 * @author root
	 */
	protected $mainModelId = 0;
	
	/**
	 * 
	 * @var array
	 * @author root
	 */
	protected $extendId = [];
	
	/**
	 * 
	 * @var unknown $model
	 */
	protected $model = null;
	
	/**
	 * 
	 * @var Collection $fields
	 */
	protected $fields = null;
	
	protected $fieldsAndModels = [];
	
	public function __construct(ElementInterface $ElementInterface,ModelInterface $ModelInterface,FieldInterface $FieldInterface) 
	{
		parent::__construct();
		
		if (module_exists('system'))
		{
			$this->middleware('Simon\System\Http\Middleware\Authenticate');
		}
		
		if (empty($this->data['model_id']))
		{
			throw new AppException('Model Id Is Not Exists!');
		}
		$this->mainModelId = $this->data['model_id'];
		$this->modelService = $ModelInterface;
		$this->extendId = $this->modelService->subExtendId($this->mainModelId);
		
		$i = 0;
		foreach(array_merge((array)$this->mainModelId,(array)$this->extendId) as $mid)
		{
			extract($this->modelService->requestModelAndFields($mid,$this->request));
			$this->fieldsAndModels[$i]['model'] = $model;
			$this->fieldsAndModels[$i]['field'] = $fields;
			$i+=1;
		}
	}
	
	/**
	 * 
	 * @param unknown $modelId
	 * @return array
	 * @author simon
	 */
	protected function listField($modelId)
	{
		$model = $this->modelService->find($modelId);
		$fields = $this->modelService->fields($model);
		
		//取出所有的列表项
// 		$fields = $fields->filter(function($item){
// 			return $item->option && in_array('list',$item->option,true);
// 		});
		$tableName = $model->table_name;
		
		//primary
		$primary = $fields->get($fields->search(function($item,$key){
			return $item->is_primary !== 2;
		}))->name;
		
		//get list option
		$databaseField = $fields->filter(function($item){
			return $item->option && in_array('list',$item->option,true) && $item->type!='Multiselect';
		})->map(function($item) use ($tableName){
			return $tableName.'.'.$item->name;
		});
		
		//MultField
		$databaseMultField = $fields->filter(function($item){
			return $item->option && in_array('list',$item->option,true) && $item->type=='Multiselect';
		})->map(function($item) use ($tableName,$primary){
			if($item->setting->store_type=='field')
			{
				return $tableName.'.'.$item->name;
			}
			
			//获取SQL查询语句的列
			$select = array_filter($item->setting->option,function($value){
				return stripos($value, 'select')!==false && stripos($value, 'from')!==false;
			});
			//这里只假定一个option里面必须只包含一个select
			$select = array_shift($select);
			//获取join所需表达式数组
			if(preg_match('/from\s+(.+)\s+/imU',$select,$match))
			{
				$expression = [];

				$field = explode(',', explode(':',$select)[count($select)-1]);
				$table = trim($match[1]);
				$expression['field'] = $item->name;
				$expression['relation_table'] = $table;
				$expression['relation_other_id'] = $table.'.'.$field[0];
				$expression['relation_show_name'] = $table.'.'.$field[1];
				$expression['main_fork_id'] = $primary;
				$expression['main_table'] = $tableName;
				//中间关联表信息
				$middle = explode(',', $item->setting->store_table);
				$expression['middle_table'] = $middle[0];
				$expression['middle_fork_id'] = $middle[0].'.'.explode(':',$middle[1])[0];
				$expression['middle_other_id'] = $middle[0].'.'.explode(':',$middle[2])[0];
				return $expression;
			}
			return false;
		});
		
		return ['mult_field'=>$databaseMultField->first(),'table'=>$model->table_name,'field'=>$databaseField->all(),'primary'=>$primary]; 
	}
	
	public function getIndex(Request $Request) 
	{
		$main = array_shift($this->fieldsAndModels);
		$mainOptions = (new ElementService($main['model'], $main['field']))->selectListOptions();

		$query= DB::table($mainOptions['table']);
		
		//数据库查询字段
		$selectFields = $mainOptions['select_field'];
		//显示的字段名
		$showFields = $mainOptions['field'];
		//显示的字段别名
		$aliasFields = $mainOptions['alias'];
		//字段名=>字段别名  的数组形式
		$showAliasFields = $mainOptions['field_alias'];
		
		$multFields = $mainOptions['relation'];
		
		foreach ($this->fieldsAndModels as $item)
		{
			$options = (new ElementService($item['model'], $item['field']))->selectListOptions();
			
			//join
			$query->join($options['table'],$mainOptions['table'].'.'.$mainOptions['primary'],'=',$options['table'].'.'.$options['primary']);
			
			//获取字段
			$selectFields = array_merge($selectFields,(array)$options['select_field']);
			$showFields = array_merge($showFields,(array)$options['field']);
			$aliasFields = array_merge($aliasFields,(array)$options['alias']);
			$showAliasFields = array_merge($showAliasFields,(array)$options['field_alias']);
			//多选字段
			$multFields = array_merge($multFields,$options['relation']);
		}
// 		dd($selectFields,$showFields,$aliasFields);
		$results = ($query->select($selectFields)->orderBy($mainOptions['table'].'.'.$mainOptions['primary'],'desc')->paginate());
		$link = $results->appends(['model_id' => $this->data['model_id']])->links();
// 		$results = collect($db->select($selectFields)->orderBy($mainOptions['table'].'.'.$mainOptions['primary'],'desc')->appends(['model_id'=>$this->data['model_id']])->paginate(15));
// 		$results = collect($db->select($selectFields)->orderBy($mainOptions['table'].'.'.$mainOptions['primary'],'desc')->appends(['model_id'=>$this->data['model_id']])->paginate(15));
		if($multFields)
		{
			foreach ($results as $result)
			{
				foreach($multFields as $mult)
				{
// 					dd($mult);
					//先查出中间表数据
					$otherId = DB::table($mult['middle_table'])->where($mult['middle_fork_id'],$result->{$mult['main_fork_id']})->where($mult['middle_fork_type'],$mult['middle_fork_type_value'])->where($mult['middle_fork_field'],$mult['field'])->lists($mult['middle_other_id']);
					//获取数据
					$result->{$mult['field']} = collect(DB::table($mult['relation_table'])->select($mult['relation_other_id'],$mult['relation_show_name'])->whereIn($mult['relation_other_id'],$otherId)->lists($mult['relation_show_name'],$mult['relation_other_id']));
				}
			}	
		}
		
		return $this->view('index',['models'=>$results,'fields'=>$showAliasFields,'page'=>$link]);
		
		dd($result,DB::getQueryLog());
		//主表字段查询表达式
		$database = $this->listField($this->mainModelId);
		
		//多数据表字段
		$multFields = [];
		$database['mult_field'] && $multFields[$database['table']] =  $database['mult_field'];
		
		//所有附表查询表达式
		$appendDatabases = [];
		foreach($this->extendId as $mid)
		{
			$appendDatabase = $this->listField($mid);
			$appendDatabase['mult_field'] && $multFields[$appendDatabase['table']] =  $appendDatabase['mult_field'];
			
			$appendDatabases[] = $appendDatabase;
		}
		
		dd($appendDatabases);
		
		//数据查询
		
		$db = DB::table($database['table']);
		$selectFields = $database['field'];
		foreach($appendDatabases as $append)
		{
			if(empty($append))
			{
				continue;
			}
			
			$selectFields = array_merge($selectFields,$append['field']);
			
			$db->join($append['table'],$database['table'].'.'.$database['primary'],'=',$append['table'].'.'.$append['primary']);
		}
		
		$data = collect($db->get());
		$data = $data->each(function($item) use ($multFields){
			if($multFields)
			{
				foreach($multFields as $multField)
				{
					$item->{$multField['field']} = DB::table($multField['relation_table'])->join($multField['middle_table'],$multField['relation_other_id'],'=',$multField['middle_other_id'])->where($multField['middle_fork_id'],$item->{$multField['main_fork_id']})->lists($multField['relation_show_name'],$multField['relation_other_id']);
				}
			}
		});
// 		dd($db->get(),DB::getQueryLog());
		
		
		
// 		DB
// 		dd($database,$appendDatabases);
		
// 		dd($Request->is('manage/element/index*'));
		
// 		dd($Request->route()->getAction(),$Request->url());
		
// 		$query = DB::select('select * from models where id=?',[3]);
		
// 		dd($query);

		return $this->view('index',['bs'=>[1,2]]);
	}
	
	/**
	 * 
	 * @param unknown $modelId
	 * @param number $valueId
	 * @author root
	 */
	protected function views($modelId,$valueId = 0)
	{
		extract($this->modelService->requestModelAndFields($modelId,$this->request));
		$model = $this->modelService->find($modelId);
		$fields = $this->modelService->fields($model);
		$data = [];
		
		//get Data
		if($valueId)
		{
			$data = (new Select($model, $fields))->find($valudId);
		}
// 		if ($valueId)
// 		{
// 			//get PrimaryKey
// 			$primary = $fields->get($fields->search(function($item,$key){
// 				return $item->is_primary !== 2;
// 			}))->name;
				
// 			//get Data
// 			$data = (array)DB::table($model->table_name)->where($primary,$valueId)->first();
				
// 			foreach ($fields as $item)
// 			{
// 				if($item->type !== 'Multiselect')
// 				{
// 					continue;
// 				}
		
// 				if ($item->setting->store_type === 'table')
// 				{
// 					$expression = $item->setting->store_table;
// 					list($table,$forkId,$otherId,$type) = explode(',', $expression);
// 					$data[$item->name] = DB::table($table)->where($forkId,$valueId)->where($type,$model->table_name)->lists($otherId);
// 				}
// 				elseif ($item->setting->store_type === 'field')
// 				{
// 					$data[$item->name] = explode(',', $data[$item->name]);
// 				}
// 			}
// 		} else {
// 			$data = [];
// 		}
		$view = (new View($model, $fields,$data))->html();
		$this->views = array_merge($view,$this->views);
	}
	
	public function getCreate() 
	{
// 		foreach (array_merge($this->extendId,[$this->mainModelId]) as $mid)
// 		{
// 			$this->views($mid);
// 		}
// $data = (new Select($model, $fields))->find($valudId);
		foreach ($this->fieldsAndModels as $item)
		{
			$view = (new View($item['model'], $item['field']))->html();
			$this->views = array_merge($this->views,$view);
		}
		return $this->view('create',['forms'=>$this->views,'model_id'=>$this->mainModelId,'append_model_ids'=>$this->extendId]);
	}
	
	protected function validator($id = 0)
	{
		foreach($this->fieldsAndModels as $item)
		{
			$this->form->validator(new AdapterElementForm($item['model'], $item['field'], $id),$this->data[$item['model']->mark]);
		}
	}
	
	public function postStore()
	{
		$this->validator();
		
		$main = array_shift($this->fieldsAndModels);
		$did = (new ElementStoreService($main['model'], $main['field']))->store($this->data[$main['model']->mark]);
		
		//附加表
		foreach($this->fieldsAndModels as $item)
		{
			(new ElementStoreService($item['model'], $item['field']))->store($this->data[$item['model']->mark],$did);
		}
		
// 		//get Fields And Model
// 		extract($this->modelService->requestModelAndFields($modelId,$this->request));
// 		//validator
// 		$this->form->validator(new AdapterElementForm($model, $fields),$this->data[$model->mark]);
// 		//store
// 		return (new Database($model, $fields,$this->data[$model->mark]))->$type($did);
		
		
		
		
// 		return $this->response(['app.success'],'manage/element/create?model_id='.$this->mainModelId);
		
// 		$mainId = $this->database($this->mainModelId,Database::STORE);
	
// 		foreach ($this->extendId as $eid)
// 		{
// 			$this->database($eid,Database::STORE,$mainId);
// 		}
	
		return $this->response(['app.success'],'manage/element/create?model_id='.$this->mainModelId);
	}
	
	public function getEdit($id)
	{
		foreach ($this->fieldsAndModels as $item)
		{
			$data = (new ElementService($item['model'], $item['field']))->find($id);
			$view = (new View($item['model'], $item['field'], $data))->html();
			$this->views = array_merge($this->views,$view);
		}
// 		foreach (array_merge($this->extendId,[$this->mainModelId]) as $mid)
// 		{
// 			$this->views($mid,$id);
// 		}
		return $this->view('edit',['forms'=>$this->views,'model_id'=>$this->mainModelId,'append_model_ids'=>$this->extendId,'id'=>$id]);
	}
	
	public function putUpdate($id)
	{
		$this->validator($id);
		
// 		$main = array_shift($this->fieldsAndModels);
// 		(new ElementUpdateService($main['model'], $main['field']))->update($this->data[$main['model']->mark],$id);
		
		//附加表
		foreach($this->fieldsAndModels as $item)
		{
			(new ElementUpdateService($item['model'], $item['field']))->update($this->data[$item['model']->mark],$id);
		}
		
		//main Table
// 		$this->database($this->mainModelId,Database::UPDATE,$id);
		
		//get Extends Id
// 		$extendId = $this->modelService->subExtendId($this->data['model_id']);
// 		foreach ($this->extendId as $eid)
// 		{
// 			$this->database($eid,Database::UPDATE,$id);
// 		}
		
		return $this->response(['app.success'],'manage/element/edit/'.$id.'?model_id='.$this->mainModelId);
	}
	
// 	protected function 
	
	/**
	 * 
	 * @param number $modelId
	 * @param string $type
	 * @param number $did
	 * @author root
	 */
	protected function store($modelId,$type,$did = 0)
	{
		//get Fields And Model
		extract($this->modelService->requestModelAndFields($modelId,$this->request));
		//validator
		$this->form->validator(new AdapterElementForm($model, $fields, $did),$this->data[$model->mark]);
		//store
		return (new ElementStoreService($model, $fields))->$type($this->data[$model->mark],$did);
// 		return (new Database($model, $fields,$this->data[$model->mark]))->$type($did);
	}

}