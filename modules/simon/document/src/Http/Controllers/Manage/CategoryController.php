<?php
namespace Simon\Document\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use App\Forms\Form;
use Simon\Document\Services\Interfaces\CategoryInterface;
use Simon\Document\Services\Category\CategoryStoreService;
use Simon\Document\Forms\Category\CategoryStoreForm;
use Simon\Document\Services\Category;
use Simon\Document\Forms\Category\CategoryUpdateForm;
use Simon\Document\Services\Category\CategoryUpdateService;
use Simon\Document\Services\Category\CategoryDestroyService;
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
	}
	
	/**
	 * 创建界面展示
	 */
	public function getCreate()
	{
		return $this->view('create');
	}
	
	public function postStore(Form $Form,CategoryStoreForm $CategoryStoreForm,CategoryStoreService $CategoryStoreService) 
	{
		$Form->validator($CategoryStoreForm);
		//
		$CategoryStoreService->store($this->data);
		
		$this->logs(['remark'=>'category store']);
		
		return $this->response('app.success','manage/category/index');
	}
	
	public function getEdit($id)
	{
		$model = $this->service->find($id);
		return $this->view('edit',['model'=>$model]);
	}
	
	public function putUpdate($id,Form $Form,CategoryUpdateForm $CategoryUpdateForm,CategoryUpdateService $CategoryUpdateService)
	{
		
		$Form->validator($CategoryUpdateForm);
		
		$CategoryUpdateService->update($id, $this->data);
		
		$this->logs(['remark'=>'category update']);
		
		return $this->response('app.success','manage/category/index');
// 		$fields = ['pid','name','status'];
		
// 		$this->validate($fields);
		
// 		$this->updateData($id,$fields);
		
// 		$this->logs(['remark'=>'update category']);
		
// 		return $this->response(['success'],'manage/category/index');
	}
	
	public function deleteDestroy(CategoryDestroyService $CategoryDestroyService)
	{
		$CategoryDestroyService->destroy($this->data['id']);
		
		$this->logs(['remark'=>'category destroy']);
		
		return $this->response('app.success');
// 	    $this->destroyData($this->data['id']);
	    
// 	    $this->logs(['remark'=>'destroy category']);
	    
// 	    return $this->response(['success']);
	    
	}
	
}