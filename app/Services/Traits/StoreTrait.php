<?php
namespace App\Services\Traits;
trait StoreTrait
{
	
	/**
	 * 数据添加处理
	 */
	protected function builtStore($model = null)
	{
		if ($model)
		{
			$model->created_uid = intval(user_session('id'));
			$model->created_type = intval(user_session('session_type'));
		}
		else
		{
			$this->model->created_uid = intval(user_session('id'));
			$this->model->created_type = intval(user_session('session_type'));
		}
	}
	
}