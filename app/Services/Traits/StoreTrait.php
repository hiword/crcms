<?php
namespace App\Services\Traits;
use App\Facades\Auth;
trait StoreTrait
{
	
	protected function builtDataStore()
	{
		$this->data['created_uid'] = Auth::id();
		$this->data['created_type'] = Auth::type();
	}
	
	/**
	 * 数据添加处理
	 */
	protected function builtModelStore()
	{
		$this->model->created_uid = Auth::id();
 		$this->model->created_type = Auth::type();
	}
	
}