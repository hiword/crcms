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
		$this->service = $ElementInterface;
		$this->modelService = $ModelInterface;
		$this->fieldService = $FieldInterface;
	}
	
	public function getIndex(Request $Request) 
	{
		
		dd($Request->is('manage/element/index*'));
		
		dd($Request->route()->getAction(),$Request->url());
		
// 		$query = DB::select('select * from models where id=?',[3]);
		
// 		dd($query);
		return $this->view('index');
	}
	
	protected function forms($modelIds)
	{
		$forms = [];
		foreach($modelIds as $id)
		{
			$model = $this->modelService->find($id);
			$fields = $this->modelService->fields($model);
			$view = (new Factory($model, $fields,$this->request))->view();
			$forms = array_merge($view,$forms);
		}
		return $forms;  
	}
	
	public function getCreate() 
	{
		//最后等待测试
		/* 这里面的一块代码，回头需要，使用一个elementService来操作，需要调用 这个fieldClient  */
		$modelId = 10;
		$extendId = $this->modelService->beExtend($modelId);
		$forms = $this->forms(array_merge([$modelId],$extendId));
		
// 		$modelIds = ;
// 		dd($modelIds);
// 		$model = $this->modelService->find($modelId);
// 		$fields = $this->modelService->fields($model);
// 		$forms = (new Factory($model, $fields))->view();
		
		
// 		$extendId = $ModelInterface->alreadyExtend($modelId);
// 		$fields = $ModelInterface->fields($model);
		
// 		$this->factory = new Factory($model, $fields);
		
// 		$forms = $this->factory->view();
// 		$forms = [];
// 		foreach ($fields as  $field)
// 		{
// 			$fieldObject = 'Simon\Model\Fields\Option\\'.$field->type;
// 			$forms[] =  (new $fieldObject($field,$model))->htmlForm();
// 		}
		
		/*=================end===================*/
// 		exit;
// 		dd($forms);
// 		$this->service->b($fields);
		return $this->view('create',['forms'=>$forms,'model_id'=>$modelId,'append_model_ids'=>$extendId]);
	}
	
	public function getEdit()
	{
		
	}
	
	protected function validators()
	{
// 		$this->form->
	}
	
	public function postStore(ModelInterface $ModelInterface)
	{
		$model = $this->modelService->find($this->data['model_id']);
		
		$fields = $this->modelService->fields($model);
		
		
// 		$this->form->validator(new AdapterElementForm($model, $fields));
		
		
		
		$this->factory = new Factory($model, $fields,$this->request);
		
// 		$validateRule = $this->factory->validator();
		
// 		$validator = Validator::make($this->data[$model->mark],$validateRule);
// 		if ($validator->fails())
// 		{
// 			dd(1,$validator->errors()->first());
// 		}
// 		dd(2);

		//store
// 		unset($this->data[$model->mark]['id']);
// 		unset($this->data[$model->mark]['mult']);

		$insertId = $this->factory->store($this->data[$model->mark]);
		
		foreach ($this->data['extend_id'] as $extendId)
		{
			$model = $this->modelService->find($extendId);
			
			$fields = $this->modelService->fields($model);
			
			$this->factory = new Factory($model, $fields,$this->request);
			
			$this->factory->store($this->data[$model->mark],$insertId,$fields->get($fields->search(function($item,$key){
				return $item->is_primary !== 2;
			}))->name);
		}
		
		exit(1);
		$data = $store_table = [];
		foreach ($fields as  $field)
		{
			if (!isset($this->data[$model->mark][$field->name]))
			{
				continue;
			}
			
			if ($field->type === 'Multiselect')
			{
				$setting = $field->setting;
				if ($setting->store_type === 'table')
				{
					$store_table[$field->name] = explode(',', $setting->store_table);
				}
				elseif ($setting->store_type === 'feld')
				{
					$data[$field->name] = implode(',', $this->data[$model->mark][$field->name]);
				}
			}
			else
			{
				$data[$field->name] = $this->data[$model->mark][$field->name];
			}
			
			
// 			$fieldObject = 'Simon\Model\Fields\Option\\'.$field->type;
// 			$validateRule[$field->name] =  (new $fieldObject($field,$model))->validateRule();
		}
		
		$b = DB::table($model->table_name)->insertGetId($data);
		if (!empty($store_table))
		{
			foreach ($store_table as $key=>$table)
			{
				$dbTable = array_shift($table);
				
				$ts = [];
				foreach ($table as $t)
				{
					$t = explode(':', $t);
					$ts = array_merge($ts,[$t[0]=>$t[1]]);
				}
				
				if (is_array($this->data[$model->mark][$key]))
				{
					$ats = [];
					foreach ($this->data[$model->mark][$key] as $value)
					{
						$ats[] = str_replace(['{Id}','{Value}'], [$b,$value], $ts);
					}
				}
				DB::table($dbTable)->insert($ats);
			}
			dd($dbTable,$ats);
		}
		dd($b);
	}
}