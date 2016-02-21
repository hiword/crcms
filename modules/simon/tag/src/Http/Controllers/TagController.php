<?php
namespace Simon\Tag\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Tag\Models\Tag;
use Simon\Tag\Models\TagContent;
use App\Services\Paginate;
class TagController extends Controller
{
	public function __construct(Tag $Tag)
	{
		parent::__construct();
		$this->model = $Tag;
		$this->view = 'tag::tag.';
	}
	
	public function getSearch()
	{
		$name = $this->request->input('name');
		$this->model = $this->model->where('name','like',"%{$name}%")->get();
		return $this->response(['success'],['model'=>$this->model]);
	}
	
	public function getIndex(Paginate $Paginate)
	{
		
		$page = $Paginate->page($this->model->select(['id','name'])
// 				,function ($models){
// 			foreach ($models as $model)
// 			{
// // 				$model->displayFilter(['name']);
				
// // 				$model->hasOneTagContent->displayFilter(['content']);
// // 				$model->content = $model->hasOneTagContent->content;
				
// 			}
// 			return $models;
// 		}
		);
		return $this->response("index",$page);
	}
	
	public function getCreate()
	{
		return $this->response("create",['name'=>$this->request->input('name')]);
	}
	
	public function postStore(TagContent $TagContent)
	{
		$this->validate(['name']);
		
		$this->validate(['content'],$TagContent);
		
		$this->model = $this->storeData(['name']);
		
		$this->storeData(['tid','content'],$TagContent,array_merge($this->data,['tid'=>$this->model->id]));
		
		return $this->response(['success'],['model'=>$this->model]);
	}
	
}