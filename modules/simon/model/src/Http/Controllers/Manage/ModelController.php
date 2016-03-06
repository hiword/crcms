<?php
namespace Simon\Model\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
class ModelController extends Controller
{
	
	public function __construct()
	{
		parent::__construct();
// 		$this->model = $Category;
		$this->view = 'model::manage.model.';
	}
	
}