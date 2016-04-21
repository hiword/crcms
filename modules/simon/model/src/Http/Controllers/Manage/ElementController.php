<?php
namespace Simon\Model\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Model\Services\Element\Interfaces\ElementInterface;
use Simon\Model\Services\Model\Interfaces\ModelInterface;
use Simon\Model\Services\Field\Interfaces\FieldInterface;
class ElementController extends Controller
{
	protected $view = 'model::manage.element.'; 
	
	public function __construct(ElementInterface $ElementInterface) 
	{
		parent::__construct();
		$this->service = $ElementInterface;
	}
	
	public function getIndex() 
	{
		
	}
	
	public function getCreate(ModelInterface $ModelInterface,FieldInterface $FieldInterface) 
	{
		$modelId = 6;
		$model = $ModelInterface->find($modelId);
		$extendId = $ModelInterface->alreadyExtend($modelId);
		$fields = $ModelInterface->fields($model);
		dd($fields);
		$this->service->b($modelId);
		return $this->view('create');
	}
}