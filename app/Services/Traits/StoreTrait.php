<?php
namespace App\Services\Traits;
trait StoreTrait
{
	
	protected function builtDataStore()
	{
		$this->data['created_uid'] = intval(user_session('id'));
		$this->data['created_type'] = intval(user_session('session_type'));
	}
	
	/**
	 * 数据添加处理
	 */
	protected function builtModelStore()
	{
		$this->model->created_uid = intval(user_session('id'));
 		$this->model->created_type = intval(user_session('session_type'));
	}
	
}