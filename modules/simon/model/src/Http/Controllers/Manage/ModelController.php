<?php
namespace Simon\Model\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Model\Services\Model\Interfaces\ModelInterface;
use Simon\Model\Forms\Model\ModelStoreForm;
use Simon\Model\Services\Model\Interfaces\ModelStoreInterface;
use Simon\Model\Forms\Model\ModelUpdateForm;
use Simon\Model\Services\Model\Interfaces\ModelUpdateInterface;
use Simon\Model\Services\Model\Interfaces\ModelDestroyInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Simon\Model\Services\Model\Interfaces\SchemaInterface;
class ModelController extends Controller
{
	
	protected $view = 'model::manage.model.';
	
	protected $redirectUrl = 'manage/model';
	
	public function __construct(ModelInterface $Model) 
	{
		parent::__construct();
		$this->service = $Model;
		
		if (module_exists('system'))
		{
			$this->middleware('Simon\System\Http\Middleware\Authenticate');
		}
		
		view()->share([
			'status'=>$this->service->status(),
			'type'=>$this->service->type(),
			'engine'=>$this->service->engine(),
		]);
	}
	
	public function getIndex() 
	{
		$models = $this->service->lists();
		return $this->view('index',['models'=>$models]);
	}
	
	public function getCreate() 
	{
		$extends = $this->service->extend();
		
		return $this->view('create',['extends'=>$extends]);
	}
	
	public function postStore(ModelStoreForm $ModelStoreForm,ModelStoreInterface $ModelStoreInterface) 
	{
		$this->form->validator($ModelStoreForm);
		
		$ModelStoreInterface->store($this->data);
		
		$this->logs(['remark'=>'store model']);
		
		return $this->response(['app.success'],$this->redirectUrl);
	}
	
	public function getTest()
	{
		return 123;
	}
	
	public function getEdit($id) 
	{
		$model = $this->service->find($id);
		
		$extends = $this->service->extend($id);
		
		$alreadyExtend = $this->service->alreadyExtend($id);
		
		return $this->view('update',['model'=>$model,'extends'=>$extends,'already_extend'=>$alreadyExtend]);
	}
	
	public function putUpdate($id,ModelUpdateForm $ModelUpdateForm,ModelUpdateInterface $ModelUpdateInterface)
	{
		$this->form->validator($ModelUpdateForm);
		
		$ModelUpdateInterface->update($id, $this->data);
		
		$this->logs(['remark'=>'update model']);
		
		return $this->response(['app.success'],$this->redirectUrl);
	}
	
	public function deleteDestroy(ModelDestroyInterface $ModelDestroyInterface)
	{
		$ModelDestroyInterface->destroy($this->data['id']);
		return $this->response(['app.success']);
	}
	
	public function getGenerate($id,SchemaInterface $SchemaInterface)
	{
		//get model
		$model = $this->service->find($id);
		
		//get fields collections
		$fields = $this->service->fields($model);
		
		//create table schema
		$SchemaInterface->createTable($model, $fields);
		
		return $this->response(['app.success']);
	}
}