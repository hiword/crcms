<?php
namespace Admin\Models;
use App\Models\Model as BaseModel;
use App\Models\SoftDeleting\SoftDeletes;
class Model extends BaseModel {
	
	use SoftDeletes;
	
	protected function dataStoreHandle() {
		parent::dataStoreHandle();
		empty($this->data['table_name']) && $this->data['table_name'] = $this->data['mark'];
	}
	
	protected function dataUpdateHandle() 
	{
		parent::dataUpdateHandle();
	}
	
	public function hasManyField()
	{
		return $this->hasMany('Admin\Models\Field','model_id','id');
	}
	
}