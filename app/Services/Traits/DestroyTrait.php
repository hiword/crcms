<?php
namespace App\Services\Traits;
use App\Facades\Auth;
trait DestroyTrait
{
	
	protected function builtDataDestroy()
	{
		$this->data['deleted_uid'] = Auth::id();
		$this->data['deleted_type'] = Auth::type();
		return $this->data;
	}
	
	protected function builtModelDestroy()
	{
		$this->model->deleted_uid = Auth::id();
		$this->model->deleted_type = Auth::type();
	}
	
	protected function updateDestroyBuilt(array $data,array $update = [],$primaryKey = 'id')
	{
		//增加软删除数据
		$this->model->whereIn($primaryKey,$data)->update($update ? array_merge($this->builtDataDestroy(),$update) : $this->builtDataDestroy());
		return $this;
	}
	
}