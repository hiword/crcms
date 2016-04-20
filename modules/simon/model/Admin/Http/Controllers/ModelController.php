<?php
namespace Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use Fields\Fields;
use Admin\Models\Model;
use Illuminate\Support\Facades\DB;
use \Admin\Fields\Model as ModelField;
use CrCms\Services\Basic\Data;
use Illuminate\Support\Facades\Route;
use CrCms\Services\Basic\Paginate;
use App\Http\Controllers\ControllerTrait;
use Admin\Models\Field;
use Illuminate\Support\Facades\View;
class ModelController extends Controller {
    
  use ControllerTrait;
	
	protected function initialization()
	{
		$this->model = new Model();
		$this->field = new \Admin\Fields\Model();
		
		parent::initialization();
		parent::manageInitialization();
		
		$this->view = 'model.';
		
		View::share([
			'status'=>[1=>'开启',2=>'关闭'],
			'type'=>[0=>'未知',1=>'独立模型',2=>'文档模型',3=>'会员模型'],
		]);
	}
	
	protected function setGuards()
	{
	    return ['name','table_name','model_id','model_path','field_path','engine','extend_id','status','remark',];
	}
	
	protected function createRelationString($fields,$tableName = null)
	{
		
		$relationString = '';
		
		foreach($fields as $values)
		{
			if ($values->relation)
			{
		
				$relation = explode(':', $values->relation);
		
				$relModel = $this->model->where('table_name',$relation[0])->first();
				
				if (empty($relModel))
				{
					continue;
				}
				
				if (!empty($tableName) && $relModel->table_name !== $tableName)
				{
					continue;
				}
		
				$relModelName = basename($relModel->model_path);
				$relModelPath = dirname($relModel->model_path);
		
				$relationString .= <<<str
		
				public function hasOne{$relModelName}()
				{
					return \$this->hasOne('{$relModel->model_path}','{$relation[1]}','{$values->name}');
				}
		
				public function hasMany{$relModelName}()
				{
					return \$this->hasMany('{$relModel->model_path}','{$relation[1]}','{$values->name}');
				}
str;
			}
		}
		return $relationString;
	}
	
	public function getGeneration(Field $Field)
	{
		
		$id = intval($this->param['id']);
		$model = $this->model->findOrFail($id);
		
		$modelPath = dirname($model->model_path);
		$modelName = basename($model->model_path);
		
		$relationString = '';
		
		//查询所有和自己相关的模型
		$relFields = $Field->where('relation','like',"%{$model->table_name}%")->get();
		
		$relationString .= $this->createRelationString($relFields,$model->table_name);
		
// 		foreach ($relFields as $relField) 
// 		{
// 			$relation = explode(':', $relField->relation);
			
// 			if ($relation[0] !== $model->table_name)
// 			{
// 				continue;
// 			}

// 			$relModel = $this->model->find($relField->model_id);
// 			if (empty($relModel))
// 			{
// 				continue;
// 			}
			
// 			$relModelName = basename($relModel->model_path);
// 			$relModelPath = dirname($relModel->model_path);
			
// 			$relationString .= <<<str
			
// 				public function hasOne{$relModelName}()
// 				{
// 					return \$this->hasOne('{$relModel->model_path}','{$relField->name}','{$relation[1]}');
// 				}
			
// 				public function hasMany{$relModelName}()
// 				{
// 					return \$this->hasMany('{$relModel->model_path}','{$relField->name}','{$relation[1]}');
// 				}
// str;

// 		}
		
		$relationString .= $this->createRelationString($model->hasManyField);
		
// 		foreach($model->hasManyField as $values)
// 		{
// 			if ($values->relation)
// 			{
				
// 				$relation = explode(':', $values->relation);
				
// 				$relModel = $this->model->where('table_name',$relation[0])->first();
				
// 				if (empty($relModel))
// 				{
// 					continue;
// 				}
				
// 				$relModelName = basename($relModel->model_path);
// 				$relModelPath = dirname($relModel->model_path);
				
// 				$relationString .= <<<str
				
// 				public function hasOne{$relModelName}()
// 				{
// 					return \$this->hasOne('{$relModel->model_path}','{$relation[1]}','{$values->name}');
// 				}
				
// 				public function hasMany{$relModelName}()
// 				{
// 					return \$this->hasMany('{$relModel->model_path}','{$relation[1]}','{$values->name}');
// 				}
// str;
				
// 			}
// 		}
		
		$str = <<<str
<?php
namespace {$modelPath};
use App\Models\Model;
class {$modelName} extends Model {
	
		$relationString
		
	
}
str;
		
		echo $str;
		
		
	}
	
}