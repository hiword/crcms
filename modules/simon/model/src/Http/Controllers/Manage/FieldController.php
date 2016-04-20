<?php
namespace Simon\Model\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Cron\FieldInterface;
use Simon\Model\Forms\Field\FieldStoreForm;
use Simon\Model\Services\Field\Interfaces\FieldStoreInterface;
use Simon\Model\Forms\Field\FieldUpdateForm;
use Simon\Model\Services\Field\Interfaces\FieldUpdateInterface;
use Simon\Model\Services\Field\Interfaces\FieldDestroyInterface;
class FieldController extends Controller
{
	
	protected $view = 'model::manage.field.';
	
	protected $redirectUrl = 'manage/field';
	
	public function __construct(FieldInterface $FieldInterface)
	{
		parent::__construct();
		$this->service = $FieldInterface;
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
		
		return $this->view('edit',['model'=>$model]);
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
	
}