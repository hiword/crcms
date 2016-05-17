<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\Field;
use Simon\Model\Fields\FieldInterface;
use Illuminate\Support\Facades\DB;
class Radio extends Field implements FieldInterface
{
	/**
	 * 
	 * @var string
	 * @author simon
	 */
	protected $type = 'radio';
	
	public function arrayForm($value = null)
	{
		$form = parent::arrayForm($value);
		$form['radio_value'] = $value ? $value : $this->field->setting->default_value;
		return $form;
	}
	
	protected function attributes($value = null)
	{
		$this->attributes['name'] = $this->attributeName();
		$this->attributes['type'] = $this->field->setting->radio_type;
	}
	
	public function filter($value)
	{
		return xss_clean($value);
	}
}