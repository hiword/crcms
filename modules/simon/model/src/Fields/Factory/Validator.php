<?php 
namespace Simon\Model\Fields\Factory;
use Simon\Model\Fields\Factory;
use Simon\Model\Fields\FactoryInterface;

class Validator extends Factory implements FactoryInterface
{
	
	public function validator($id = 0)
	{
		$validateRule = [];
		foreach ($this->fields as $field)
		{
			$validateRule[$field->name] = $field->instance->validateRule();
		}
		return $validateRule;
	}
	
}
