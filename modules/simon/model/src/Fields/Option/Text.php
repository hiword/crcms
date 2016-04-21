<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\Field;
use Simon\Model\Fields\FieldInterface;
class Text extends Field implements FieldInterface
{
	
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\FieldInterface::setting()
	 * @author simon
	 */
	public function setting(array $setting = array())
	{
		// TODO Auto-generated method stub
		return (string)view('model::field.text',['setting'=>$setting]);
	}
	
	public function htmlForm($value = null)
	{
		
	}
	
// 	public function arrayForm($value = null)
// 	{
// 		$formAttribute = $this->field->form_attr;
		
// 		//auto complete name
// 		$formAttribute['name'] = "{$this->model->mark}[{$this->field->name}]";
		
// 		//auto complete value
// 		if ($value)
// 		{
// 			$formAttribute['value'] = $value;
// 		}
		
// 		//auto complete type
// 		if (empty($formAttribute['type'])) 
// 		{
// 			$formAttribute['type'] = 'text';
// 		}
		
// 		return $formAttribute;
// 		dd($this->field->form_attr);
// 		$this->field
// 		$array = [
// 			$this->field->name=>[
				
// 			],
// 		];
		
// 		'name'=>[
// 				'is_show'=>1,
// 				'is_fillable'=>1,
// 				'validator_php'=>function () {
// 				return $this->uniqueValidator('required|min:3|max:20','name');
// 				}
// 				],
// 	}

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\Field::attributes()
	 * @author root
	 */
	protected function attributes($value = null)
	{
		// TODO Auto-generated method stub
		//auto complete name
		$this->attributes['name'] = $this->attributeName();
		
		//auto complete value
		$value && $this->attributes['value'] = $value;
		
		//auto complete type
		empty($this->attributes['type']) && $this->attributes['type'] = 'text';
	}

	public function filter($value)
	{
		return clean_xss($value);
	}
	
	
}