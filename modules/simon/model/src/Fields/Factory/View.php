<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 16-6-1
 * Time: 下午6:52
 */
namespace Simon\Model\Fields\Factory;
use Simon\Model\Fields\Factory;
use Simon\Model\Models\Model;
use Illuminate\Database\Eloquent\Collection;
use Simon\Model\Models\Field;
use function foo\func;
use Simon\Model\Fields\FactoryInterface;

class View extends Factory implements FactoryInterface
{

	public function html()
	{
		return $this->views('htmlForm');
	}
	
	public function array()
	{
		return $this->views('arrayForm');
	}
		
	protected function views($func)
	{
		$views = [];
		foreach ($this->fields as $field)
		{
			$views[$field->name] = call_user_func_array([$field->instance,$func],[$this->value($field)]);
		}
		return $views;
	}
	
	protected function value(Field $field)
	{
		return $value = isset($this->data[$field->name]) ? $this->data[$field->name] : null;;
	}

}