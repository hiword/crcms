<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\Field;
use Simon\Model\Fields\FieldInterface;
class Checkbox extends Field implements FieldInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\FieldInterface::setting()
	 * @author simon
	 */
	public function setting(array $setting = array())
	{
		// TODO Auto-generated method stub
		return view('model::field.checkbox',['setting'=>$setting]);
	}

	public function filter($value) 
	{
		
	}
	
}