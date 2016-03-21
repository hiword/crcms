<?php
namespace App\Fields;
use Illuminate\Database\Eloquent\Model;
abstract class Field 
{
	
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
	protected $data = [];
	
	protected $fields = [];
	
	/**
	 * 初始化
	 * @param string $value
	 * @author simon
	 */
	public function __construct($value = null,array $data = [])
	{
		$this->value = $value;
		$this->data = $data;
	}
	
	/**
	 * 
	 * @param array $fields
	 * @param array $data
	 * @param string $method
	 * @return array || object
	 */
	public function fields(array $fields,array $data = [],$method = null)
	{
		
		foreach ($fields as $key=>$field)
		{
			if (!in_array($key, $this->fields,true))
			{
				continue;
			}
			
			$field = new $field(isset($data[$key]) ? $data[$key] : null,$data);
			
			if ($method)
			{
				$field = $field->$method();
			}
		}
		
		return $fields;
// 		foreach ($fields as $key=>&$field)
// 		{
// 			$unqiueKey = trim(strtolower($field),'\\');
// 			if (isset(static::$instanses[$unqiueKey]))
// 			{
// 				//这里因为实例化后，直接返回，导致data参数和fields的value都没有发生变化
// 				//可能会有问题，先这样
// 				$field =  static::$instanses[$unqiueKey];
// 			}
// 			else
// 			{
// 				$field = new $field(isset(static::$data[$key]) ? static::$data[$key] : null);
// 			}
			
// 			if ($method)
// 			{
// 				$field = $field->$method();
// 			}
// 		}
		
// 		return $fields;
	}
	
	/**
	 * 获取指定字段
	 * @param array $keys  允许的字段
	 * @param array $data   Field填充数据
	 * @param string $method  Field中运行的方法
	 * @return array
	 * @author simon
	 */
// 	public static function fields(Model $model,array $fields = [],$data = [],$method = null)
// 	{
// 		$allowFields = $model->fields;
	
// 		if (!empty($fields))
// 		{
// 			foreach($allowFields as $key=>$value)
// 			{
// 				if (!in_array($key,$fields,true)) unset($allowFields[$key]);
// 			}
// 		}
	
// 		//参数快捷便利化
// 		if (is_string($data))
// 		{
// 			$method = $data;
// 			$data = [];
// 		}
	
// 		return static::factory($allowFields,$data,$method);
// 	}
}