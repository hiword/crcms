<?php
namespace App\Services\Traits;
trait UpdateTrait
{
	
	protected function builtUpdate()
	{
		$this->model->updated_uid = intval(user_session('id'));
		$this->model->updated_type = intval(user_session('session_type'));
	}
	
}