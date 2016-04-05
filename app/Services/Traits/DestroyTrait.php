<?php
namespace App\Services\Traits;
trait DestroyTrait
{
	
	protected function builtDestroy()
	{
		$this->model->deleted_uid = intval(user_session('id'));
		$this->model->deleted_type = intval(user_session('session_type'));
	}
	
	protected function updateDestroyBuilt(array $data)
	{
		//增加软删除数据
		$this->model->whereIn($this->model->primaryKey,$data)->update($this->destroyHandle());
		return $this;
	}
}