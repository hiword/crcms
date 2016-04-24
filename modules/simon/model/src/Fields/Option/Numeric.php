<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\FieldInterface;
use Simon\Model\Fields\Field;
class Numeric extends Field implements FieldInterface
{
	
	protected $type = 'numeric';
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\Field::attributes()
	 * @author root
	 */
	protected function attributes($value = null)
	{
		// TODO Auto-generated method stub
		$this->attributes['type'] = 'number';
		$this->attributes['name'] = $this->attributeName();
		$this->attributes['value'] = $value ? $value : $this->field->setting->default_value;
	}

}