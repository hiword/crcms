<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\Field;
use Simon\Model\Fields\FieldInterface;
class Textarea extends Field implements FieldInterface
{
	
	protected $type = 'textarea';
	
	public function arrayForm($value = null)
	{
		$form = parent::arrayForm($value);
		
		$form['value'] = $value ? $value : '';
		
		return $form;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\Field::attributes()
	 * @author root
	 */
	protected function attributes($value = null)
	{
		// TODO Auto-generated method stub
		$this->attributes['name'] = $this->attributeName();
	}
	
	public function filter($value)
	{
		return xss_clean($value);
	}
}