<?php
namespace Simon\Model\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Model\Forms\Field\FieldStoreForm;
use Simon\Model\Services\Field\Interfaces\FieldStoreInterface;
use Simon\Model\Forms\Field\FieldUpdateForm;
use Simon\Model\Services\Field\Interfaces\FieldUpdateInterface;
use Simon\Model\Services\Field\Interfaces\FieldDestroyInterface;
use Simon\Model\Services\Field\Interfaces\FieldInterface;
use Simon\Model\Services\Model\Interfaces\ModelInterface;
class FieldController extends Controller
{
	
	protected $view = 'model::manage.field.';
	
	protected $redirectUrl = 'manage/field';
	
	public function __construct(FieldInterface $FieldInterface,ModelInterface $ModelInterface)
	{
		parent::__construct();
		
		if (module_exists('system'))
		{
			$this->middleware('Simon\System\Http\Middleware\Authenticate');
		}
		
		$this->service = $FieldInterface;
		
		view()->share([
			'_models'=>$ModelInterface->lists(),
			'field_types'=>config('model.field_types'),
			'status'=>$this->service->status(),
			'primaryKey'=>$this->service->primary(),
			'list'=>$this->service->listOption(),
			'search'=>$this->service->search(),
			'option'=>$this->service->option(),
		]);
	}
	
	public function getIndex()
	{
		$page = $this->service->paginate();
		return $this->view('index',$page);
	}
	
	public function getCreate()
	{
		return $this->view('create');
	}
	
	public function postStore(FieldStoreForm $FieldStoreForm,FieldStoreInterface $FieldStoreInterface)
	{
		$this->form->validator($FieldStoreForm);
		
		$FieldStoreInterface->store($this->data);
		
		$this->logs(['remark'=>'store field']);
		
		return $this->response(['app.success'],$this->redirectUrl);
	}
	
	public function getEdit($id)
	{
		$model = $this->service->find($id);
		$models = $this->service->models($model);
		return $this->view('edit',['model'=>$model,'models'=>$models]);
	}
	
	public function putUpdate($id,FieldUpdateForm $FieldUpdateForm,FieldUpdateInterface $FieldUpdateInterface)
	{
		$this->form->validator($FieldUpdateForm);
		
		$FieldUpdateInterface->update($id, $this->data);
		
		$this->logs(['remark'=>'update field']);
		
		return $this->response(['app.success'],$this->redirectUrl);
	}
	
	public function deleteDestroy(FieldDestroyInterface $FieldDestroyInterface)
	{
		$FieldDestroyInterface->destroy($this->data['id']);
		
		return $this->response(['app.success']);
	}
	
	public function postFieldSetting() 
	{
		$namespace = '\Simon\Model\Fields\Option\\'.$this->data['type'];
		
		$field = null;
		
		if (!empty($this->data['id']))
		{
			$field = $this->service->find($this->data['id']);
		}
		return $this->response(['app.success'],['template'=>(new $namespace($field))->setting()]);
	}
	
}