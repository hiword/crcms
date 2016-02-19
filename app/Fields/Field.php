<?php
namespace App\Fields;
abstract class Field 
{
	/**
	 * 
	 * @var unknown
	 * @author simon
	 */
	const STORE_HANDLE = 'storeHandle';
	
	/**
	 * 
	 * @var unknown
	 * @author simon
	 */
	const UPDATE_HANDLE = 'updateHandle';
	
	/**
	 * 
	 * @var unknown
	 * @author simon
	 */
	const DESTROY_HANDLE = 'destroyHandle';
	
	/**
	 * 
	 * @var unknown
	 * @author simon
	 */
	const VALIDATE_RULE = 'validateRule';
	
	/**
	 * 字段值
	 * @var mixed
	 * @author simon
	 */
	protected $value = null;
	
	/**
	 * 实例化数据接口
	 * @var array
	 * @author simon
	 */
	protected static $instanses = [];
	
	/**
	 * 静态数据
	 * @var array
	 * @author simon
	 */
	protected static $data = [];
	
	/**
	 * 初始化
	 * @param string $value
	 * @author simon
	 */
	public function __construct($value = null)
	{
		$value && $this->value = $value;
	}
	
	/**
	 * 数据验证规则
	 * @author simon
	 */
	abstract public function validateRule();
	
	/**
	 * 表单属性
	 * @author simon
	 */
	abstract public function formAttributes();
	
	/**
	 * 字段处理
	 * @author simon
	 */
	abstract public function handle();
	
	/**
	 * 存储处理
	 * @author simon
	 */
	abstract public function storeHandle();
	
	/**
	 * 编辑处理
	 * @author simon
	 */
	abstract public function updateHandle();
	
	/**
	 * 删除处理
	 * @author simon
	 */
	abstract public function destroyHandle();
	
	/**
	 * 字段的静态工厂方法，获取指定字段的类
	 * @param array $fields
	 * @param array $data
	 * @param string $method
	 * @return array_object
	 */
	public static function factory(array $fields,array $data = [],$method = null)
	{
		//设置静态数据
		static::$data = $data;
		
		foreach ($fields as $key=>&$field)
		{
// 			var_dump($field);
			$unqiueKey = trim(strtolower($field),'\\');
			if (isset(static::$instanses[$unqiueKey]))
			{
				//这里因为实例化后，直接返回，导致data参数和fields的value都没有发生变化
				//可能会有问题，先这样
				$field =  static::$instanses[$unqiueKey];
			}
			else
			{
				$field = new $field(isset(static::$data[$key]) ? static::$data[$key] : null);
			}
			
			if ($method)
			{
				$field = $field->$method();
			} 
		}
		
		return $fields;
	}
}