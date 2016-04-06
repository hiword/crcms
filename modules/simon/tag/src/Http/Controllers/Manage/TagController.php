<?php
namespace Simon\Tag\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Tag\Services\Tag\Interfaces\TagInterface;
use Simon\Tag\Services\Tag\Interfaces\TagStoreInterface;
use Simon\Tag\Services\TagContent\Interfaces\TagContentStoreInterface;
use Simon\Tag\Forms\Tag\TagStoreForm;
use Simon\Tag\Forms\TagContent\TagContentStoreForm;
use Simon\Tag\Forms\Tag\TagUpdateForm;
use Simon\Tag\Forms\TagContent\TagContentUpdateForm;
use Simon\Tag\Services\Tag\TagUpdateService;
use Simon\Tag\Services\TagContent\TagContentUpdateSerivce;
use Simon\Tag\Services\Tag\Interfaces\TagUpdateInterface;
use Simon\Tag\Services\TagContent\Interfaces\TagContentUpdateInterface;
class TagController extends Controller
{
	
	protected $view = 'tag::manage.tag.';
	
	public function __construct(TagInterface $Tag) 
	{
		parent::__construct();
		
	    //$this->middleware('Simon\System\Http\Middleware\Authenticate');
		
		$this->service = $Tag;
		
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
	
	public function postStore(TagStoreForm $TagStoreForm,TagContentStoreForm $TagContentStoreForm,TagStoreInterface $TagStoreInterface,TagContentStoreInterface $TagContentStoreInterface)
	{
		
		$this->form->validator($TagStoreForm);
// 		$fields = ['name','status'];
// 		$this->validate($fields);

		$this->form->validator($TagContentStoreForm);
		
		
		
// 		$this->validate(['content'],$TagContent);

		$model = $TagStoreInterface->store($this->data);
		$TagContentStoreInterface->store($model->id,$this->data);
		
// 		$this->model = $this->storeData($fields);
// 		$this->storeData(['tid','content'],$TagContent,array_merge($this->data,['tid'=>$this->model->id]));
		
		//logs
		$this->logs(['remark'=>'add tags']);
		
		return $this->response(['app.success'],'manage/tags/index');
	}
	
	public function getEdit($id) 
	{
		$model = $this->service->find($id);
		return $this->view('edit',['model'=>$model]);
	}
	
	public function putUpdate($id,TagUpdateForm $TagUpdateForm,TagContentUpdateForm $TagContentUpdateForm,TagUpdateInterface $TagUpdateInterface,TagContentUpdateInterface $TagContentUpdateInterface) 
	{
		
		$this->form->validator($TagUpdateForm);
		
		$this->form->validator($TagContentUpdateForm);
		
// 		$fields = ['name','status'];
// 		$this->validate($fields);
		
// 		$this->validate(['content'],$TagContent);

// 		$TagUpdateService->sto
		$TagUpdateInterface->update($id, $this->data);
		
		$TagContentUpdateInterface->update($id, $this->data);
		
// 		$this->model = $this->updateData($id,$fields);
// 		$this->updateData($id,['content'],$TagContent);
		
		$this->logs(['remark'=>'update tags']);
		
		return $this->response(['app.success'],'manage/tags/index');
	}
	
	public function deleteDestroy(TagContent $TagContent)
	{
		$this->destroyData($this->data['id']);
		
		$this->logs(['remark'=>'delete tags']);
		 
		return $this->response(['success']);
	}
	
}