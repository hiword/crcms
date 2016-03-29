<?php
namespace Simon\Document\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Document\Fields\Category\Status;
use App\Forms\Form;
use Simon\Document\Services\Interfaces\CategoryInterface;
use Simon\Document\Services\Category\CategoryStoreService;
use Simon\Document\Forms\Category\CategoryStoreForm;
use Simon\Document\Services\Category;
use App\Services\Cud;
use Simon\Document\Forms\Category\CategoryUpdateForm;
use Simon\Document\Services\Category\CategoryUpdateService;
class CategoryController extends Controller
{
	protected $view = 'document::manage.category.';
	
	public function __construct(CategoryInterface $Category)
	{
	    parent::__construct();
	    
// 		$this->middleware('Simon\System\Http\Middleware\Authenticate');
		
		$this->service = $Category;
		
		view()->share([
			'tree'=>$this->service->tree(),
			'status'=>$this->service->status(),
		]);
	}
	
	public function getIndex()
	{
		
		return $this->view('index');
// 		return $this->response('index');
	}
	
	/**
	 * 创建界面展示
	 */
	public function getCreate()
	{
		return $this->view('create');
	}
	
	public function postStore(Form $Form,CategoryStoreForm $CategoryStoreForm,Cud $Cud,CategoryStoreService $CategoryStoreService) 
	{
		
		$Form->validator($CategoryStoreForm);
		
		//
		$CategoryStoreService->store($this->data);
		
// 		$CUd->save($CategoryStoreService);
// 		$this->service->handle($this->data,['pid','name','mark','status'])->store();
		
		return redirect('manage/category/index');
// 		exit();
// 		$fields = ['pid','name','mark','status'];
		
// 		$this->validate($fields);
		
// 		$this->storeData($fields);
		
// // 		$this->logs(['remark'=>'add category']);
		
// 		return $this->response(['success'],'manage/category/index');
	}
	
	public function getEdit($id)
	{
		$this->model = $this->model->findOrFail($id);
		return view($this->view.'edit',['model'=>$this->model]);
	}
	
	public function putUpdate($id,Form $Form,CategoryUpdateForm $CategoryUpdateForm,CategoryUpdateService $CategoryUpdateService)
	{
		$Form->validator($CategoryUpdateForm);
		
		$CategoryUpdateService->update($id, $this->data);
		
		return redirect('manage/category/index');
// 		$fields = ['pid','name','status'];
		
// 		$this->validate($fields);
		
// 		$this->updateData($id,$fields);
		
// 		$this->logs(['remark'=>'update category']);
		
		return $this->response(['success'],'manage/category/index');
	}
	
	public function deleteDestroy()
	{
	    $this->destroyData($this->data['id']);
	    
	    $this->logs(['remark'=>'destroy category']);
	    
	    return $this->response(['success']);
	}
	
}