<?php
namespace Simon\Model\Fields;

use Illuminate\Support\Facades\DB;
abstract class Field
{
	/**
	 * 
	 * @var Simon\Model\Models\Model
	 * @author simon
	 */
	protected $model = null;
	
	/**
	 * 
	 * @var Simon\Model\Models\Field
	 * @author simon
	 */
	protected $field = null;
	
	/**
	 * 表单类型
	 * @var string
	 * @author simon
	 */
	protected $type = null;
	
	/**
	 * 表单属性
	 * @var array
	 * @author simon
	 */
	protected $attributes = [];
	
	/**
	 * 
	 * @param \Simon\Model\Models\Field $field
	 * @param \Simon\Model\Models\Model $model
	 * @author simon
	 */
	public function __construct(\Simon\Model\Models\Field $field = null,\Simon\Model\Models\Model $model = null)
	{
		$this->field = $field;
		$this->model = $model;
		$this->attributes = $this->field ? $this->field->attribute : [];
	}
	
	/**
	 * 数组表单
	 * @param mixed $value
	 * @author simon
	 */
	public function arrayForm($value = null)
	{
		$form = [];
	
		$form['label'] = $this->field->alias;
		
		$form['tip'] = $this->field->tip;
		
		$form['role'] = $this->field->type;
		
		//attributes
		$attributes = $this->attributes($value);
		$form['attributes'] = $attributes ? $attributes : $this->attributes;
	
		//options
		if (isset($this->field->setting->option))
		{
			$form['options'] = $this->options(enter_format_array($this->field->setting->option));
		}
	
		return $form;
	}
	
	/**
	 * 
	 * @param mixed $value
	 * @author simon
	 */
	public function htmlForm($value = null)
	{
		$form = $this->arrayForm($value);
		
		$str = '';
		foreach ($form['attributes'] as $key=>$value)
		{
			$str .= "{$key}=\"{$value}\" ";
		}
		
		$form['attribute'] = $str;
		
		return (string)view('model::field.template.'.$this->type,$form);
	}
	
	/**
	 * 
	 * @param array $option
	 * @author simon
	 */
	protected function options(array $option)
	{
		$options = [];
		
		foreach ($option as $op)
		{
			if (stripos($op, 'select') !== false)
			{
				$op = explode(':', $op);
				$results = DB::select($op[0],explode(',', $op[1]));
				if ($results)
				{
					$ov = explode(',', $op[2]);
	
					foreach ($results as $result)
					{
						$options[$result->{$ov[0]}] = $result->{$ov[1]};
					}
				}
			}
			else
			{
				$op = explode(':', $op);
				$options[$op[0]] = $op[1];
			}
		}
		
		return $options;
	}
	
	/**
	 * 
	 * @param mixed $value
	 * @author simon
	 */
	abstract protected function attributes($value = null);
	
	/**
	 * 
	 * @param array $setting
	 * @author simon
	 */
	public function setting()
	{
		return (string)view("model::field.{$this->type}",['setting'=>$this->field->setting]);
	}
	
	/**
	 * 
	 * @author simon
	 */
	protected function attributeName()
	{
		return "{$this->model->mark}[{$this->field->name}]";
	}
	
}