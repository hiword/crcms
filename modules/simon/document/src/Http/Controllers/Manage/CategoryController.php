<?php
namespace Simon\Document\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Document\Models\Category;
use Simon\Document\Fields\Category\Status;
class CategoryController extends Controller
{
	
	public function __construct(Category $Category)
	{
	    parent::__construct();
	    
// 		$this->middleware('Simon\System\Http\Middleware\Authenticate');
		
		$this->model = $Category;
		$this->view = 'document::manage.category.';
		
		view()->share([
			'tree'=>category_tree(),
			'status'=>Status::STATUS,
		]);
	}
	
	public function getIndex()
	{
		return $this->response('index');
	}
	
	/**
	 * 创建界面展示
	 */
	public function getCreate()
	{
		return $this->response('create');
	}
	
	public function postStore() 
	{
		$fields = ['pid','name','mark','status'];
		
		$this->validate($fields);
		
		$this->storeData($fields);
		
		$this->logs(['remark'=>'add category']);
		
		return $this->response(['success'],'manage/category/index');
	}
	
	public function getEdit($id)
	{
		$this->model = $this->model->findOrFail($id);
		return $this->response('edit',['model'=>$this->model]);
	}
	
	public function putUpdate($id)
	{
		$fields = ['pid','name','status'];
		
		$this->validate($fields);
		
		$this->updateData($id,$fields);
		
		$this->logs(['remark'=>'update category']);
		
		return $this->response(['success'],'manage/category/index');
	}
	
	public function deleteDestroy()
	{
	    $this->destroyData($this->data['id']);
	    
	    $this->logs(['remark'=>'destroy category']);
	    
	    return $this->response(['success']);
	}
	
}