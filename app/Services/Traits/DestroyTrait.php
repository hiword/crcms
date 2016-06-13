<?php
namespace App\Services\Traits;
use App\Facades\Auth;
trait DestroyTrait
{
	
	public function builtExternalDataDestroy()
	{
		$data = [];
		$data['updated_uid'] = Auth::id();
		$data['updated_type'] = Auth::type();
		return $data;
	}
	
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
	
	/****只做到这里，这里批量删除，要重新，思考下  ***/
	public function updateDestroyExternalBuilt(array $data,array $update = [],$primaryKey = 'id')
	{
		//增加软删除数据
		$this->model->whereIn($primaryKey,$data)->update($update ? array_merge($this->builtDataDestroy(),$update) : $this->builtDataDestroy());
		return $this;
	}
	
}