<?php
namespace App\Services\Traits;
trait DestroyTrait
{
	
	protected function builtDataDestroy()
	{
		$this->data['deleted_uid'] = intval(user_session('id'));
		$this->data['deleted_type'] = intval(user_session('session_type'));
	}
	
	protected function builtModelDestroy()
	{
		$this->model->deleted_uid = intval(user_session('id'));
		$this->model->deleted_type = intval(user_session('session_type'));
	}
	
	protected function updateDestroyBuilt(array $data,array $update = [],$primaryKey = 'id')
	{
		//增加软删除数据
		$this->model->whereIn($primaryKey,$data)->update($update ? array_merge($this->builtDataDestroy(),$update) : $this->builtDataDestroy());
		return $this;
	}
	
}