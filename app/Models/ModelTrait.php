<?php
namespace App\Models;

use App\Fields\Field;
use Illuminate\Support\Facades\DB;
trait ModelTrait {
	
	/**
	 * 数据存储标志
	 * @var string
	 */
// 	const DATA_STORE = 'store';
	
// 	/**
// 	 * 数据修改标志
// 	 * @var string
// 	 */
// 	const DATA_UPDATE = 'update';
	
	
// 	/**
// 	 * 数据销毁标志
// 	 * @var string
// 	 */
// 	const DATA_DESTROY = 'destroy';
	
	/**
	 * 模型数据
	 * @var array
	 * @author simon
	 */
	protected $data = array();
	
	/**
	 * 字段数据
	 * @var array
	 * @author simon
	 */
	protected static $fields = [];
	
	/**
	 * 数据添加标志 -- 解决trait中无法使用常量代替
	 * @author simon
	 */
	public static function dataStoreSign()
	{
		return 'store';
	}
	
	/**
	 * 数据编辑标志 -- 解决trait中无法使用常量代替
	 * @author simon
	 */
	public static function dataUpdateSign()
	{
		return 'update';
	}
	
	/**
	 * 数据删除标志 -- 解决trait中无法使用常量代替
	 * @author simon
	 */
	public static function dataDestroySign()
	{
		return 'destroy';
	}
	
	/**
	 * 设置模型数据
	 * @param array $data
	 * @return \App\Models\Model
	 */
	protected function setData(array $data)
	{
		$data && $this->data = $data;
		return $this;
	}
	
	/**
	 * 设置处理模型
	 * @param string $action
	 */
	protected function setDataHandleMethod($action = null)
	{
		//公共方法
		method_exists($this, 'dataHandle') && $this->dataHandle();
	
		if ($action)
		{
			$action = 'data'.ucwords($action).'Handle';
			method_exists($this, $action) && $this->$action();
		}
	
		return $action;
	}
	
	/**
	 * 数据添加处理
	 */
	protected function dataStoreHandle()
	{
		$this->data['created_uid'] = intval(user_session('id'));
		$this->data['created_type'] = intval(user_session('session_type'));
	}
	
	/**
	 * 添加新数据[created]
	 * @param array $data
	 * @return Ambigous <boolean, NULL>
	 */
	public function storeData(array $data = array())
	{
	
		//设置默认值
		$this->setData($data);
	
		//
		$this->setDataHandleMethod(static::dataStoreSign());//static::DATA_STORE
	
		//保存数据
		return $this->create($this->data);
	}
	
	/**
	 * 数据修改处理
	 */
	protected function dataUpdateHandle()
	{
		$this->data['updated_uid'] = intval(user_session('id'));
		$this->data['updated_type'] = intval(user_session('session_type'));
	}
	
	/**
	 * 保存数据
	 * @param numeric $id
	 * @param array $data
	 * @return Ambigous <boolean, NULL>
	 */
	public function updateData($id,array $data = array())
	{
		//设置默认值
		$this->setData($data);
	
		//
		$this->setDataHandleMethod(static::dataUpdateSign());//static::DATA_UPDATE
	
		//保存数据
	
		//复合主键支持
		if (is_array($this->primaryKey) && is_array($id))
		{
			$object = $this->where($id);
		}
		else
		{
			$object = $this->where($this->primaryKey,$id);
		}
	
		return $object->update($this->data);
	}
	
	
	/**
	 * 数据修改处理
	 */
	protected function dataDestroyHandle()
	{
		$this->data['deleted_uid'] = intval(user_session('id'));
		$this->data['deleted_type'] = intval(user_session('session_type'));
	}
	
	/**
	 * 数据销毁
	 * @param array|string|object $data
	 * @return \Illuminate\Routing\Route
	 */
	public function destroyData(array $data)
	{
		//设置默认值
		$this->setData(['_primaryKey'=>$data]);
	
		//
		$this->setDataHandleMethod(static::dataDestroySign());//static::DATA_DESTROY
		
		//增加软删除数据
		$this->whereIn($this->primaryKey,$this->data['_primaryKey'])->update(array_except($this->data, '_primaryKey'));
		
		return $this->destroy($data);
	}
	
	/**
	 * 获取指定字段
	 * @param array $keys  允许的字段
	 * @param array $data   Field填充数据
	 * @param string $method  Field中运行的方法
	 * @return array
	 * @author simon
	 */
	public static function fields(array $fields = [],$data = [],$method = null)
	{
		$allowFields = static::$fields;
	
		if (!empty($fields))
		{
			foreach($allowFields as $key=>$value)
			{
				if (!in_array($key,$fields,true)) unset($allowFields[$key]);
			}
		}
	
		//参数快捷便利化
		if (is_string($data))
		{
			$method = $data;
			$data = [];
		}
	
		return Field::factory($allowFields,$data,$method);
	}
	
	/**
	 * 自动输出过滤
	 * @param array $fields
	 * @param array|Model $mixed
	 * @author simon
	 */
	public function displayFilter(array $fields,$mixed = [])
	{
		//自动添加主键
		!is_array($this->primaryKey) && $fields[] = $this->primaryKey;
		
		if ($mixed)
		{
			return array_only((array)$mixed,$fields);
		}
		else
		{
			$this->attributes = array_only($this->attributes, $fields);
			return $this;
		}
	}
	
	/**
	 * 时间转换
	 * @param array $convers
	 * @author simon
	 */
	public function converTime(array $convers = [])
	{
		empty($convers) && $convers = [static::CREATED_AT,static::UPDATED_AT];
	
		foreach ($convers as $value)
		{
			if (isset($this->attributes[$value]))
			{
				$this->attributes[$value.'_diff'] = time_difference($this->attributes[$value]);
				$this->attributes[$value.'_time'] = format_date($this->attributes[$value]);
			}
		}
	
		return $this;
	}
}