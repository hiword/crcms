<?php
namespace App\Services;
trait ServiceCudTrait
{
	
	/**
	 * 模型数据
	 * @var array
	 * @author simon
	 */
	protected $data = [];
	
	/**
	 * 设置模型数据
	 * @param array $data
	 * @return \App\Models\Model
	 */
	public function handle(array $data,$fields = [])
	{
		$this->data = empty($fields) ? $data : array_except($data,$fields);
		return $this;
	}
	
	/**
	 * 设置处理模型
	 * @param string $action
	 */
	protected function setHandleMethod($action = null)
	{
		//公共方法
		method_exists($this, 'dataHandle') && $this->dataHandle();
	
		if ($action)
		{
			$action = ucwords($action).'Handle';
			method_exists($this, $action) && $this->$action();
		}
	
		return $action;
	}
	
	/**
	 * 数据添加处理
	 */
	protected function storeHandle()
	{
		$this->data['created_uid'] = intval(user_session('id'));
		$this->data['created_type'] = intval(user_session('session_type'));
	}
	
	/**
	 * 添加新数据[created]
	 * @param array $data
	 * @return Ambigous <boolean, NULL>
	 */
	public function store(array $data = [],array $fields = [])
	{
	
		if (empty($this->data))
		{
			$this->handle($data,$fields);
		}
	
		$this->setHandleMethod('store');//
	
		//保存数据
		return $this->create($this->data);
	}
	
	/**
	 * 数据修改处理
	 */
	protected function updateHandle()
	{
		$this->data['updated_uid'] = intval(user_session('id'));
		$this->data['updated_type'] = intval(user_session('session_type'));
	}
	
	/**
	 * 保存数据
	 * @param numeric || array $id
	 * @param array $data
	 * @return Ambigous <boolean, NULL>
	 */
	public function update($id,array $data = [],array $fields = [])
	{
		//设置默认值
		if (empty($this->data))
		{
			$this->handle($data,$fields);
		}
	
		//
		$this->setHandleMethod('update');//
	
		//保存数据
	
		//复合主键支持
		if (is_array($this->model->primaryKey) && is_array($id))
		{
			$object = $this->where($id);
		}
		else
		{
			$object = $this->where($this->model->primaryKey,$id);
		}
	
		return $object->update($this->data);
	}
	
	
	/**
	 * 数据删除处理
	 */
	protected function destroyHandle()
	{
		$this->data['deleted_uid'] = intval(user_session('id'));
		$this->data['deleted_type'] = intval(user_session('session_type'));
	}
	
	/**
	 * 数据销毁
	 * @param array|string|object $data
	 * @return \Illuminate\Routing\Route
	 */
	public function destroy(array $data = [])
	{
		if (empty($this->data))
		{
			$this->handle($data);
		}
	
		//设置默认值
		$this->data['_primaryKey'] = $this->data;
	
		//
		$this->setHandleMethod('destroy');//
	
		//增加软删除数据
		$this->whereIn($this->model->primaryKey,$this->data['_primaryKey'])->update(array_except($this->data, '_primaryKey'));
	
		return $this->destroy($this->data['_primaryKey']);
	}
	
}