<?php
namespace Simon\Tag\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Tag\Models\Tag;
use App\Services\Paginate;
use Simon\Tag\Fields\Tags\Status;
class TagController extends Controller
{
	
	
	public function __construct(Tag $Tag) 
	{
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
}