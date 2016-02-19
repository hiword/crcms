<?php
namespace Simon\Model\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
class FieldController extends Controller
{
	
	
	public function __construct()
	{
		parent::__construct();
		
		$this->view = 'model.manage.field.';
	}
	
	public function getIndex()
	{
		return 123;
		return $this->response('index');
	}
	
	public function getCreate()
	{
		return $this->response('create');
	}
	
}