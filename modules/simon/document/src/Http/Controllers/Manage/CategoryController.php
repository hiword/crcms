<?php
namespace Simon\Document\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Document\Services\Category\Interfaces\CategoryInterface;
use Simon\Document\Forms\Category\CategoryStoreForm;
use Simon\Document\Services\Category;
use Simon\Document\Forms\Category\CategoryUpdateForm;
use Simon\Document\Services\Category\Interfaces\CategoryStoreInterface;
use Simon\Document\Services\Category\Interfaces\CategoryUpdateInterface;
use Simon\Document\Services\Category\Interfaces\CategoryDestroyInterface;
class CategoryController extends Controller
{
	protected $view = 'document::manage.category.';
	
	public function __construct(CategoryInterface $Category)
	{
	    parent::__construct();
	    
	    if (module_exists('system'))
	    {
	    	$this->middleware('Simon\System\Http\Middleware\Authenticate');
	    }
		
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
	
	public function postStore(CategoryStoreForm $CategoryStoreForm,CategoryStoreInterface $CategoryStoreInterface) 
	{
		//
		$this->form->validator($CategoryStoreForm);
		
		//
		$CategoryStoreInterface->store($this->data);
		
		//
		$this->logs(['remark'=>'category store']);
		
		return $this->response('app.success','manage/category/index');
	}
	
	public function getEdit($id)
	{
		$model = $this->service->find($id);
		return $this->view('edit',['model'=>$model]);
	}
	
	public function putUpdate($id,CategoryUpdateForm $CategoryUpdateForm,CategoryUpdateInterface $CategoryUpdateInterface)
	{
		
		$this->form->validator($CategoryUpdateForm);
		
		$CategoryUpdateInterface->update($id, $this->data);
		
		$this->logs(['remark'=>'category update']);
		
		return $this->response('app.success','manage/category/index');
	}
	
	public function deleteDestroy(CategoryDestroyInterface $CategoryDestroyInterface)
	{
		$CategoryDestroyInterface->destroy($this->data['id']);
		
		$this->logs(['remark'=>'category destroy']);
		
		return $this->response('app.success');
	}
	
}