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
		
		if ($this->field)
		{
			$this->resolveAttribute($this->field->attribute);
		}
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
			$form['options'] = $this->options($this->field->setting->option);
		}
	
		return $form;
	}
	
	protected function resolveAttribute(array $attributes)
	{
		foreach ($attributes as $attribute)
		{
			$attribute = explode(':',$attribute);
			if (count($attribute) === 2) 
			{
				$this->attributes[$attribute[0]] = str_replace(',',' ',$attribute[1]);
			}
		}
		return $this->attributes;
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
// 		$option = enter_format_array($option)
		$options = [];
		foreach ($option as $op)
		{
			if (stripos($op, 'select') !== false)
			{
				$op = explode(':', $op);
				$showField = array_pop($op);
				$results = DB::select($op[0],isset($op[1]) ? $op[1] : []);//,explode(',', $op[1])
				if (empty($results)) {continue;}
				
				$ov = explode(',', $showField);
				array_map(function($result) use (&$options,$ov){
					$options[$result->{$ov[0]}] = $result->{$ov[1]};
				}, $results);
			}
			else
			{
				$op = explode(':', $op);
				$options[$op[0]] = $op[1];
			}
		}
		
		return $options;
	}
	
	public function show($value,$primaryKey = 'id')
	{
		return $value;
	}
	
	public function filter($value)
	{
		return clean_xss($value);
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
		return (string)view("model::field.{$this->type}",['setting'=>isset($this->field->setting) ? $this->field->setting : new \stdClass()]);
	}
	
	public function validateRule($id = 0)
	{
		
		return $this->field->validate_rule  
					?
					array_map(function($value) use ($id){
						return str_replace('{Id}',$id,$value);
					}, $this->field->validate_rule)
					: [];
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