<?php
namespace Simon\Tag\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideInterface;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideDestroyInterface;
class RelationController extends Controller
{
	
	protected $view = 'tag::manage.relation.';
	
	public function __construct(TagOutsideInterface $TagOutsideInterface) 
	{
		parent::__construct();
		$this->service = $TagOutsideInterface;
	}
	
	public function getIndex() 
	{
		$page = $this->service->paginateBackend();
		return $this->view('index',$page);
	}
	
	public function deleteDestroy(TagOutsideDestroyInterface $TagOutsideDestroyInterface) 
	{
		$TagOutsideDestroyInterface->destroy($this->data['id']);
		
		return $this->response(['app.success']);
	}
}