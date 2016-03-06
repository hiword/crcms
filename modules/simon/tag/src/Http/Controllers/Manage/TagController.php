<?php
namespace Simon\Tag\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Tag\Models\Tag;
use App\Services\Paginate;
use Simon\Tag\Fields\Tags\Status;
use Simon\Tag\Models\TagContent;
class TagController extends Controller
{
	
	
	public function __construct(Tag $Tag) 
	{
	    $this->middleware('Simon\System\Http\Middleware\Authenticate');
		parent::__construct();
		$this->model = $Tag;
		$this->view = "tag::manage.tag.";
		view()->share([
				'status'=>Status::STATUS,
		]);
	}
	
	public function getIndex(Paginate $Paginate) 
	{
		$page = $Paginate->setUrlParams($this->data)->page($this->model->orderBy('created_at','desc'));
		return $this->response('index',$page);
	}
	
	public function getCreate() 
	{
		return $this->response('create');
	}
	
	public function postStore(TagContent $TagContent)
	{
		$fields = ['name','status'];
		$this->validate($fields);
		
		$this->validate(['content'],$TagContent);
		
		$this->model = $this->storeData($fields);
		$this->storeData(['tid','content'],$TagContent,array_merge($this->data,['tid'=>$this->model->id]));
		
		//logs
		$this->logs(['remark'=>'add tags']);
		
		return $this->response(['success'],'manage/tags/index');
	}
	
	public function getEdit($id) 
	{
		$this->model = $this->model->findOrFail($id);
		return $this->response('edit',['model'=>$this->model]);
	}
	
	public function putUpdate($id,TagContent $TagContent) 
	{
		$fields = ['name','status'];
		$this->validate($fields);
		
		$this->validate(['content'],$TagContent);
		
		$this->model = $this->updateData($id,$fields);
		$this->updateData($id,['content'],$TagContent);
		
		$this->logs(['remark'=>'update tags']);
		
		return $this->response(['success'],'manage/tags/index');
	}
	
	public function deleteDestroy(TagContent $TagContent)
	{
		$this->destroyData($this->data['id']);
		
		$this->logs(['remark'=>'delete tags']);
		 
		return $this->response(['success']);
	}
	
}