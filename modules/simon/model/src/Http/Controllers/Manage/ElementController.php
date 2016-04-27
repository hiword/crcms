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
		
// 		dd($Request->is('manage/element/index*'));
		
// 		dd($Request->route()->getAction(),$Request->url());
		
// 		$query = DB::select('select * from models where id=?',[3]);
		
// 		dd($query);

		return $this->view('index',['bs'=>[1,2]]);
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
		$extendId = $this->modelService->beExtend($modelId,$this->request);
		$forms = $this->forms(array_merge([$modelId],$extendId));
		return $this->view('create',['forms'=>$forms,'model_id'=>$modelId,'append_model_ids'=>$extendId]);
	}
	
	public function getEdit()
	{
		
	}
	
	protected function database($modelId,$insertId = 0)
	{
		$model = $this->modelService->find($modelId);
		
		$fields = $this->modelService->fields($model);
		
		$this->form->validator(new AdapterElementForm($model, $fields),$this->data[$model->mark]);
		
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