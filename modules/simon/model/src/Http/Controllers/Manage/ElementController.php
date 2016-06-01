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
class ElementController extends Controller
{
	protected $view = 'model::manage.element.'; 
	
	protected $factory = null;
	
	protected $modelService = null;
	
	protected $fieldService = null;
	
	public function __construct(ElementInterface $ElementInterface,ModelInterface $ModelInterface,FieldInterface $FieldInterface) 
	{
		parent::__construct();
		
		if (module_exists('system'))
		{
			$this->middleware('Simon\System\Http\Middleware\Authenticate');
		}
		
		$this->service = $ElementInterface;
		$this->modelService = $ModelInterface;
		$this->fieldService = $FieldInterface;
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
		
		$primary = $fields->get($fields->search(function($item,$key){
			return $item->is_primary !== 2;
		}))->name;
		
		$databaseField = $fields->filter(function($item){
			return $item->option && in_array('list',$item->option,true) && $item->type!='Multiselect';
		})->map(function($item) use ($tableName){
			return $tableName.'.'.$item->name;
		});
		
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
				$field = explode(',', explode(':',$select)[2]);
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
		
		
		
		
// 		if($databaseField->isEmpty())
// 		{
// 			return [];
// 		}
// // 		dd($databaseField);
		return ['mult_field'=>$databaseMultField->first(),'table'=>$model->table_name,'field'=>$databaseField->all(),'primary'=>$primary]; 
// // 		dd($databaseField);
// 		$result = DB::table($model->table_name)->select($databaseField->all())->get();
// 		dd($result);
// 		dd($fields,$b);
// 		//取出字段
// 		$databaseField = [];
// 		foreach($fields as $field)
// 		{
// 			$databaseField[] = $field->name;
// 		}
// 		dd($databaseField);
	}
	
	public function getIndex(Request $Request) 
	{
		$modelId = 10;
		
		//主表字段查询表达式
		$database = $this->listField($modelId);
		
		//多数据表字段
		$multFields = [];
		$database['mult_field'] && $multFields[$database['table']] =  $database['mult_field'];
		
		//所有附表查询表达式
		$extendId = $this->modelService->beExtend($modelId,$this->request);
		$appendDatabases = [];
		foreach($extendId as $id)
		{
			$appendDatabase = $this->listField($id);
			$appendDatabase['mult_field'] && $multFields[$appendDatabase['table']] =  $appendDatabase['mult_field'];
			
			$appendDatabases[] = $appendDatabase;
		}
		
		
		
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
	
	protected function forms($modelId,$id = 0)
	{
		$model = $this->modelService->find($modelId);
		$fields = $this->modelService->fields($model);
		if ($id)
		{
			$primary = $fields->get($fields->search(function($item,$key){
				return $item->is_primary !== 2;
			}))->name;
			$data = (array)DB::table($model->table_name)->where($primary,$id)->first();
			
			//mults
			$index = $fields->search(function($item,$key){
				return $item->type === 'Multiselect';
			});
			if ($index !== false)
			{
				$multField = $fields->get($index);
				
				if ($multField->setting->store_type === 'table')
				{
					$expression = $multField->setting->store_table;
					list($table,$fork,$other) = explode(',', $expression);
					$forkId = explode(':', $fork)[0];
					$otherId = explode(':', $other)[0];
					$data[$multField->name] = DB::table($table)->where($forkId,$id)->lists($otherId);
				}
				elseif ($multField->setting->store_type === 'field')
				{
					$data[$multField->name] = explode(',', $data[$multField->name]);
				}
			}
			
			
		}
		else {
			$data = [];
		}
		return (new Factory($model, $fields,$this->request))->view($data);
	}
	
// 	protected function forms($modelIds,array $data = [])
// 	{
// 		$forms = [];
// 		foreach($modelIds as $id)
// 		{
// 			$model = $this->modelService->find($id);
// 			$fields = $this->modelService->fields($model);
// 			$view = (new Factory($model, $fields,$this->request))->view($data);
// 			$forms = array_merge($view,$forms);
// 		}
// 		return $forms;  
// 	}
	
	public function getCreate() 
	{
		//最后等待测试
		/* 这里面的一块代码，回头需要，使用一个elementService来操作，需要调用 这个fieldClient  */
		$modelId = 10;
		$extendId = $this->modelService->beExtend($modelId,$this->request);
		
		$forms = [];
		foreach(array_merge([$modelId],$extendId) as $id)
		{
			$forms = array_merge($this->forms($id),$forms);;
		}
// 		$forms = $this->forms(array_merge([$modelId],$extendId));
		return $this->view('create',['forms'=>$forms,'model_id'=>$modelId,'append_model_ids'=>$extendId]);
	}
	
	public function getEdit()
	{
		$id = 1;
		$modelId = 10;
		//查找数据
		$extendId = $this->modelService->beExtend($modelId,$this->request);
		
		$forms = [];
		foreach(array_merge([$modelId],$extendId) as $mid)
		{
			$forms = array_merge($this->forms($mid,$id),$forms);;
		}
		// 		$forms = $this->forms(array_merge([$modelId],$extendId));
		return $this->view('edit',['forms'=>$forms,'model_id'=>$modelId,'append_model_ids'=>$extendId,'id'=>$id]);
	}
	
	protected function database($modelId,$insertId = 0)
	{
		$model = $this->modelService->find($modelId);
		
		$fields = $this->modelService->fields($model);
		
		$this->form->validator(new AdapterElementForm($model, $fields),$this->data[$model->mark]);
		
		$this->factory = new Factory($model,$fields,$this->request);
		
		return $this->factory->store($this->data[$model->mark],$fields->get($fields->search(function($item,$key){
			return $item->is_primary !== 2;
		}))->name,$insertId);
	}
	
	public function postStore()
	{
		//主表数据
		$mainId = $this->database($this->data['model_id']);
		
		if (!empty($this->data['extend_id']))
		{
			foreach ($this->data['extend_id'] as $extendId)
			{
				$this->database($extendId,$mainId);
			}
		}
		
		return $this->response(['success'],'element/create');		
	}
}