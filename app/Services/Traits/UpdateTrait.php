<?php
namespace App\Services\Traits;
use App\Facades\Auth;
trait UpdateTrait
{
	
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