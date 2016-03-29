<?php
namespace App\Services;
abstract class AbsCud
{
	/**
	 * 
	 * @var App\Models\Model
	 * @author simon
	 */
	protected $model = null;
	
	public function __construct(){}
	
	/**
	 * 数据添加处理
	 */
	protected function builtStore()
	{
		$this->model->created_uid = intval(user_session('id'));
		$this->model->created_type = intval(user_session('session_type'));
	}
	
	protected function builtUpdate()
	{
		$this->model->updated_uid = intval(user_session('id'));
		$this->model->updated_type = intval(user_session('session_type'));
	}
	
	protected function builtDestroy()
	{
		$this->model->deleted_uid = intval(user_session('id'));
		$this->model->deleted_type = intval(user_session('session_type'));
	}
	
	protected function updateDestroyBuilt(array $data)
	{
		//增加软删除数据
		$this->model->whereIn($this->model->primaryKey,$data)->update($this->destroyHandle());
		
		return $this;
	}
	
}