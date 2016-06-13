<?php
namespace Simon\Model\Forms\Element;
use Simon\Model\Forms\ElementForm;
use App\Forms\AbsForm;
use App\Forms\Interfaces\FormInterface;
use Simon\Model\Fields\Factory;
use Simon\Model\Fields\Factory\Validator;
class AdapterElementForm extends ElementForm implements FormInterface
{
	protected $model = null;
	
	protected $fields = null;
	
	protected $id = 0;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::getAttr()
	 * @author root
	 */
	public function getAttr()
	{
		// TODO Auto-generated method stub
		
	}

	public function __construct($model,$fields,$id = 0)
	{
		parent::__construct();
		$this->model = $model;
		$this->fields = $fields;
		$this->id = $id;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Forms\ElementForm::getRule()
	 * @author root
	 */
	public function getRule()
	{
		$validateRule = [];
		foreach ($this->fields as $field)
		{
			$validateRule[$field->name] = $field->instance->validateRule($this->id);
		}
		return $validateRule;
		// TODO Auto-generated method stub
		return (new Validator($this->model,$this->fields))->validator($this->id);
		$this->factory = new Factory($this->model, $this->fields,$this->request);
		return $this->factory->validator();
	}

	
	
	
}