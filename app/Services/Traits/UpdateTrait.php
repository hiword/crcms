<?php
namespace App\Services\Traits;
use App\Facades\Auth;
trait UpdateTrait
{
	
	public function builtExternalDataUpdate()
	{
		$data = [];
		$data['updated_uid'] = Auth::id();
		$data['updated_type'] = Auth::type();
		return $data;
	}
	
	protected function builtDataUpdate()
	{
		$this->data['updated_uid'] = Auth::id();
		$this->data['updated_type'] = Auth::type();
	}
	
	protected function builtModelUpdate()
	{
		$this->model->updated_uid = Auth::id();
		$this->model->updated_type = Auth::type();
	}
	
}