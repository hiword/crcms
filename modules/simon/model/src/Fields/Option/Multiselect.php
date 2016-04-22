<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\Field;
use Simon\Model\Fields\FieldInterface;
class Multiselect extends Field implements FieldInterface
{
	
	/**
	 * 
	 * @var string
	 * @author simon
	 */
	protected $type = 'multiselect';
	
	/**
	 * 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\Field::arrayForm()
	 * @author simon
	 */
	public function arrayForm($value = null)
	{
		$form = parent::arrayForm($value);
		
		//多选默认值multi_value
		$form['multi_value'] = $value ? (array)$value : explode(',',$this->field->setting->default_value);
		return $form;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\Field::attributes()
	 * @author simon
	 */
	protected function attributes($value = null)
	{
		$this->attributes['type'] = $this->field->setting->mult_type;
		$this->attributes['name'] = $this->attributeName().'[]';
		
		//防止用户输入value属性
		unset($this->attributes['value']);
	}
	
}