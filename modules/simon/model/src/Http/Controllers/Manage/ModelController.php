<?php
namespace Simon\Model\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Model\Services\Model\Interfaces\ModelInterface;
use Simon\Model\Forms\Model\ModelStoreForm;
use Simon\Model\Services\Model\Interfaces\ModelStoreInterface;
use Simon\Model\Forms\Model\ModelUpdateForm;
use Simon\Model\Services\Model\Interfaces\ModelUpdateInterface;
class ModelController extends Controller
{
	
	protected $view = 'model::manage.model.';
	
	protected $redirectUrl = 'manage/model';
	
	public function __construct(ModelInterface $Model) 
	{
		parent::__construct();
		$this->service = $Model;
		
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
	
	public function getGenerate()
	{
		return $this->response(['app.success']);
	}
}