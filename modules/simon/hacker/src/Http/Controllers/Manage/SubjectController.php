<?php
namespace Simon\Hacker\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Hacker\Services\Subject\Interfaces\SubjectInterface;
use Simon\Hacker\Forms\Subject\SubjectStoreForm;
use Simon\Hacker\Services\Subject\Interfaces\SubjectStoreInterface;
use Simon\Hacker\Forms\Subject\SubjectUpdateForm;
use Simon\Hacker\Services\Subject\Interfaces\SubjectUpdateInterface;
use Simon\Hacker\Services\Subject\Interfaces\SubjectDestroyInterface;
class SubjectController extends Controller
{
	
	protected $view = 'hacker::manage.subject.';
	
	public function __construct(SubjectInterface $SubjectInterface)
	{
		parent::__construct();	
		$this->service = $SubjectInterface;
		
		view()->share([
			'status'=>$this->service->status(),	
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
	
	public function postStore(SubjectStoreForm $SubjectStoreForm,SubjectStoreInterface $SubjectStoreInterface)
	{
		$this->form->validator($SubjectStoreForm);
		
		$SubjectStoreInterface->store($this->data);
		
		return $this->response(['success'],'manage/subject/index');
	}
	
	public function getEdit($id) 
	{
		$model = $this->service->find($id);
		
		return $this->view('edit',['model'=>$model]);
	}
	
	public function putUpdate($id,SubjectUpdateForm $SubjectUpdateForm,SubjectUpdateInterface $SubjectUpdateInterface) 
	{
		$this->form->validator($SubjectUpdateForm);
		
		$SubjectUpdateInterface->update($id, $this->data);
		
		return $this->response(['success'],'manage/subject/index');
	}
	
	public function deleteDestroy(SubjectDestroyInterface $SubjectDestroyInterface)
	{
		$SubjectDestroyInterface->destroy($this->data['id']);
		return $this->response(['app.success']);
	}
}