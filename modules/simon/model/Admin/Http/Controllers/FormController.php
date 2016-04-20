<?php
namespace Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Admin\Fields\Admin;
use Admin\Fields\Model;
use Admin\Fields\Field;
use Document\Fields\Category;
class FormController extends Controller {
	
	public function postLogin() {
		
		$this->attributes = ['email','password'];
		$this->field = new Admin();
		
		return $this->response(['success'],$this->form());
	}
	
	public function postModel() 
	{
		$this->attributes = ['name','table_name','model_path','field_path','engine','extend_id','status','remark',];
		$this->field = new Model();
		return $this->response(['success'],$this->form());
	}
	
	public function postField()
	{
		$this->attributes = ['name','type','length','is_primary','field_option','relation','status','default_value',];
		$this->field = new Field();
		return $this->response(['success'],$this->form());
	}
	
	public function postCategory()
	{
		$this->attributes = ['name','model_id','status',];
		$this->field = new Category();
		return $this->response(['success'],$this->form());
	}
}