<?php
namespace App\Services\Traits;
trait UpdateTrait
{
	
	protected function builtDataUpdate()
	{
		$this->data['updated_uid'] = intval(user_session('id'));
		$this->data['updated_type'] = intval(user_session('session_type'));
	}
	
	protected function builtModelUpdate()
	{
		$this->model->updated_uid = intval(user_session('id'));
		$this->model->updated_type = intval(user_session('session_type'));
	}
	
}