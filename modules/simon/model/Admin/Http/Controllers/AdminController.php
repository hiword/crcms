<?php
namespace Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Admin\Models\Admin;
use CrCms\Services\Basic\Paginate;
use CrCms\Services\Basic\Search;
class AdminController extends Controller {
	
	
	public function initialization() {
		
		$this->model = new Admin();
		$this->field = new \Admin\Fields\Admin();
		
		parent::initialization();
	}
	
	public function index(Paginate $paginate,Search $search) 
	{
		
		$search = $search->setField(['id','name','email','status','login_time','login_ip','created_at'])->setOrder(['created_at','desc'])->searchd();
		
		$page = $paginate->addComponent(['model'=>$search])->page();
		
		return $this->response(['success'],$page);
	}

	

}