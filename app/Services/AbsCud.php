<?php
namespace App\Services;
abstract class AbsCud
{
	
	protected $data = [];
	
	protected $fillable = [];
	
	/**
	 * 
	 * @param array $data
	 * @return \App\Services\AbsCud
	 * @author simon
	 */
	protected function data(array $data)
	{
		$this->data = $data;
		return $this;
	}
	
	/**
	 * 
	 * @param array $fields
	 * @author simon
	 */
	protected function fillable(array $fields)
	{
		$this->data = array_except($this->data, $fields);
	
		return $this;
	}
	
	/**
	 * 数据添加处理
	 */
	protected function builtStore()
	{
		$this->data['created_uid'] = intval(user_session('id'));
		$this->data['created_type'] = intval(user_session('session_type'));
		return $this;
	}
	
	protected function builtUpdate()
	{
		$this->data['updated_uid'] = intval(user_session('id'));
		$this->data['updated_type'] = intval(user_session('session_type'));
		return $this;
	}
	
	protected function builtDestroy()
	{
		$this->data['deleted_uid'] = intval(user_session('id'));
		$this->data['deleted_type'] = intval(user_session('session_type'));
		return $this;
	}
	
	protected function updateDestroyBuilt(array $data)
	{
		//增加软删除数据
		$this->model->whereIn($this->model->primaryKey,$data)->update($this->destroyHandle());
		
		return $this;
	}
	
}