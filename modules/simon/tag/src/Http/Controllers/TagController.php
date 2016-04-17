<?php
namespace Simon\Tag\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Services\Paginate;
use Simon\Tag\Services\Tag\Interfaces\TagInterface;
use Simon\Tag\Forms\Tag\TagStoreForm;
use Simon\Tag\Services\Tag\Interfaces\TagStoreInterface;
use Simon\Tag\Forms\Tag\TagUserStoreForm;
use Simon\Document\Services\Category\Interfaces\CategoryInterface;
class TagController extends Controller
{
	
	public function __construct(TagInterface $Tag,CategoryInterface $CategoryInterface)
	{
		parent::__construct();
		$this->service = $Tag;
		$this->view = 'tag::'.config('site.theme').'.tag.';
		
		view()->share([
			'categories'=>$CategoryInterface->lists(),
		]);
	}
	
	public function getSearch()
	{
		$models = $this->service->search($this->data['name']);
		return $this->response(['app.success'],['models'=>$models]);
	}
	
	public function getIndex()
	{
		$page = $this->service->paginateFront();
// 		$page = $Paginate->page($this->model->select(['id','name'])
// 				,function ($models){
// 			foreach ($models as $model)
// 			{
// // 				$model->displayFilter(['name']);
				
// // 				$model->hasOneTagContent->displayFilter(['content']);
// // 				$model->content = $model->hasOneTagContent->content;
				
// 			}
// 			return $models;
// 		}
// 		);
		return $this->view("index",$page);
	}
	
	public function getCreate()
	{
		return $this->view("create",['name'=>$this->request->input('name')]);
	}
	
	public function postStore(TagUserStoreForm $TagStoreForm,TagStoreInterface $TagStoreInterface)
	{
		
		$this->form->validator($TagStoreForm);
		
		$model = $TagStoreInterface->userStore($this->data);
		
		return $this->response(['app.success'],['model'=>$model]);
		
// 		$this->validate(['name']);
		
// 		$this->validate(['content'],$TagContent);
		
// 		$this->model = $this->storeData(['name']);
		
// 		$this->storeData(['tid','content'],$TagContent,array_merge($this->data,['tid'=>$this->model->id]));
		
// 		return $this->response(['success'],['model'=>$this->model]);
	}
	
// 	public function postAssocTags()
// 	{
// 		$tags = $this->model->hasManyTags($this->data['id'],'Simon\\'.$this->data['model']);
// 		return $this->response(['success'],['tags'=>$tags]);
// 	}
}