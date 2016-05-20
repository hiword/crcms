<?php
namespace Simon\Tag\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Tag\Services\Tag\Interfaces\TagInterface;
use Simon\Tag\Services\Tag\Interfaces\TagStoreInterface;
use Simon\Tag\Forms\Tag\TagStoreForm;
use Simon\Tag\Forms\Tag\TagUpdateForm;
use Simon\Tag\Services\Tag\Interfaces\TagUpdateInterface;
use Simon\Tag\Services\Tag\Interfaces\TagDestroyInterface;
class TagController extends Controller
{
	
	protected $view = 'tag::manage.tag.';
	
	public function __construct(TagInterface $Tag) 
	{
		parent::__construct();
		
		if (module_exists('system'))
		{
			$this->middleware('Simon\System\Http\Middleware\Authenticate');
		}
		
		$this->service = $Tag;
		
		view()->share([
			'status'=>$this->service->status(),
		]);
	}
	
	public function getIndex() 
	{
		$page = $this->service->paginateBackend();
		return $this->view('index',$page);
	}
	
	public function getCreate() 
	{
		return $this->view('create');
	}
	
	public function postStore(TagStoreForm $TagStoreForm,TagStoreInterface $TagStoreInterface)
	{
		//validator
		$this->form->validator($TagStoreForm);

		//store
		$TagStoreInterface->store($this->data);
		
		//logs
		$this->logs(['remark'=>'add tags']);
		
		return $this->response(['app.success'],'manage/tags/index');
	}
	
	public function getEdit($id) 
	{
		$model = $this->service->find($id);
		return $this->view('edit',['model'=>$model]);
	}
	
	public function putUpdate($id,TagUpdateForm $TagUpdateForm,TagUpdateInterface $TagUpdateInterface) 
	{
		//validator
		$this->form->validator($TagUpdateForm);
		
		//update
		$TagUpdateInterface->update($id, $this->data);
		
		//logs
		$this->logs(['remark'=>'update tags']);
		
		return $this->response(['app.success'],'manage/tags/index');
	}
	
	public function deleteDestroy(TagDestroyInterface $TagDestroyInterface)
	{
		$TagDestroyInterface->destroy($this->data['id']);
		
		$this->logs(['remark'=>'delete tags']);
		 
		return $this->response(['success']);
	}
	
}