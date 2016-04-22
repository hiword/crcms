<?php
namespace Simon\Model\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Model\Services\Element\Interfaces\ElementInterface;
use Simon\Model\Services\Model\Interfaces\ModelInterface;
use Simon\Model\Services\Field\Interfaces\FieldInterface;
use Illuminate\Support\Facades\DB;
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
		$query = DB::select('select * from models where id=?',[3]);
		
		dd($query);
	}
	
	public function getCreate(ModelInterface $ModelInterface,FieldInterface $FieldInterface) 
	{
		$modelId = 6;
		$model = $ModelInterface->find($modelId);
		$extendId = $ModelInterface->alreadyExtend($modelId);
		$fields = $ModelInterface->fields($model);
		
		$forms = [];
		foreach ($fields as  $field)
		{
			$fieldObject = 'Simon\Model\Fields\Option\\'.$field->type;
			echo  (new $fieldObject($field,$model))->htmlForm();
		}
// 		dd($forms);
// 		$this->service->b($fields);
		return $this->view('create');
	}
}