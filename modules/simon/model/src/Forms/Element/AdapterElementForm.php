<?php
namespace Simon\Model\Forms\Element;
use Simon\Model\Forms\ElementForm;
use App\Forms\AbsForm;
use App\Forms\Interfaces\FormInterface;
use Simon\Model\Fields\Factory;
class AdapterElementForm extends ElementForm implements FormInterface
{
	protected $model = null;
	
	protected $fields = null;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Forms\Interfaces\FormInterface::getAttr()
	 * @author root
	 */
	public function getAttr()
	{
		// TODO Auto-generated method stub
		
	}

	public function __construct($model,$fields)
	{
		parent::__construct();
		$this->model = $model;
		$this->fields = $fields;
		
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Forms\ElementForm::getRule()
	 * @author root
	 */
	public function getRule()
	{
		// TODO Auto-generated method stub
		$this->factory = new Factory($this->model, $this->fields,$this->request);
		return $this->factory->validator();
	}

	
	
	
}