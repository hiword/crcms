<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\Field;
use Simon\Model\Fields\FieldInterface;
use Illuminate\Support\Facades\DB;
class Radio extends Field implements FieldInterface
{
// 	protected $attributes = [];
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\FieldInterface::arrayForm()
	 * @author root
	 */
// 	public function arrayForm($value = null)
// 	{
// 		$form = [];
		
// 		$form['attributes'] = $this->attributes($value);
		
// 		$form['label'] = $this->field->alias;
		
// 		$form['tip'] = $this->field->tip;
		
// 		if ((boolean)$options = $this->field->setting->option)
// 		{
// 			$this->options($this->formatEnter($options));
// 		}
		
// 		return $form;
// 	}
	

	
	
	
	protected function attributes($value = null)
	{
		$this->attributes['name'] = $this->attributeName();
		$this->attributes['radio_value'] = $value;
		$this->attributes['type'] = $this->field->setting->radio_type;
	}
	

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\FieldInterface::htmlForm()
	 * @author root
	 */
	public function htmlForm($value = null)
	{
		// TODO Auto-generated method stub
		
	}

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\FieldInterface::setting()
	 * @author root
	 */
	public function setting(array $setting = array())
	{
		// TODO Auto-generated method stub
		return $this->settingView('radio',$setting);
	}

	
}