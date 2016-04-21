<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\Field;
use Simon\Model\Fields\FieldInterface;
class Text extends Field implements FieldInterface
{
	
	protected $setting = null;
	
	
	public function __construct($field = null)
	{
		$this->field = $field;
	}
	
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
	
	public function showHtml($value)
	{
		
	}
	
	public function showArray()
	{
		$array = [
			$this->field->name=>[
				
			],
		];
		
// 		'name'=>[
// 				'is_show'=>1,
// 				'is_fillable'=>1,
// 				'validator_php'=>function () {
// 				return $this->uniqueValidator('required|min:3|max:20','name');
// 				}
// 				],
	}

	public function filter($value)
	{
		return clean_xss($value);
	}
	
	
}