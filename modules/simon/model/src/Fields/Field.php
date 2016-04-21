<?php
namespace Simon\Model\Fields;

use Illuminate\Support\Facades\DB;
abstract class Field
{
	protected $model = null;
	
	protected $field = null;
	
	protected $html = null;
	
	protected $attributes = null;
	
	public function __construct(\Simon\Model\Models\Field $field = null,\Simon\Model\Models\Model $model = null)
	{
		$this->field = $field;
		$this->model = $model;
		$this->attributes = $this->field->attribute;
	}
	
	public function arrayForm($value = null)
	{
		$form = [];
	
		$form['label'] = $this->field->alias;
		
		$form['tip'] = $this->field->tip;
		
		//attributes
		$attributes = $this->attributes($value);
		$form['attributes'] = $attributes ? $attributes : $this->attributes;
	
		//options
		if (isset($this->field->setting->option))
		{
			$this->options($this->formatEnter($this->field->setting->option));
		}
	
		return $form;
	}
	
	protected function formatEnter($value)
	{
		return explode("\n", str_replace("\r\n","\n", $value));
	}
	
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
	
	abstract protected function attributes($value = null);
	
	protected function settingView($type,array $setting = [])
	{
		return (string)view("model::field.{$type}",['setting'=>$setting]);
	}
	
	protected function attributeName()
	{
		return "{$this->model->mark}[{$this->field->name}]";
	}
	
}