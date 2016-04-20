<?php
namespace Admin\Models;
use App\Models\Model;
use App\Models\SoftDeleting\SoftDeletes;
class Field extends Model {
	
	use SoftDeletes;
	
	public function dataStoreHandle() 
	{
		parent::dataStoreHandle();
		$this->data['field_option'] = empty($this->data['field_option']) ? '' : json_encode($this->data['field_option']);
		$this->data['setting'] = empty($this->data['setting']) ? '' : json_encode($this->data['setting']);
	}
	
	public function dataUpdateHandle() 
	{
		parent::dataUpdateHandle();
		$this->data['field_option'] = empty($this->data['field_option']) ? '' : json_encode($this->data['field_option']);
		$this->data['setting'] = empty($this->data['setting']) ? '' : json_encode($this->data['setting']);
	}
	
}