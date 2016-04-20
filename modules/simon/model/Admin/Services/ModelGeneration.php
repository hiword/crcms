<?php
namespace Admin\Services;

use Admin\Models\Model;
use Admin\Models\Field;
class ModelGeneration 
{
	
	protected $field = [];
	
	protected $model = null;
	
	public function __construct(Model $model = null)
	{
		$model && $this->setModel($model);
	}
	
	protected function setModel(Model $model)
	{
		$this->model = $model;
	}
	
	protected function createRelationString()
	{
		
		$fields = Field::where('relation',"like","%{$this->model->table_name}")->get();
		if (empty($fields))
		{
			return null;
		}
		
		$relationString = '';
		
		foreach($fields as $values)
		{
			if ($values->relation)
			{
		
				$relation = explode(':', $values->relation);
				
				if ($relation[0] !== $this->model->table_name)
				{
					continue;
				}
				
				//获取关联模型信息
				$relModel = Model::find($values->model_id);
		
				$relModelName = basename($relModel->model_path);
				//$relModelPath = dirname($relModel->model_path);
		
				$relationString .= <<<str
		
				public function hasOne{$relModelName}()
				{
					return \$this->hasOne('{$relModel->model_path}','{$values->name}','{$relation[1]}');
				}
		
				public function hasMany{$relModelName}()
				{
					return \$this->hasMany('{$relModel->model_path}','{$values->name}','{$relation[1]}');
				}
str;
			}
		}
		
		return $relationString;
	}
	
	public function create(Model $model = null)
	{
		$model && $this->setModel($model);
		
		if (empty($this->model))
		{
			return false;
		}
		
		$relString = $this->createRelationString();
		
		$modelName = basename($this->model->model_path);
		$modelPath = dirname($this->model->model_path);
		$modelString = <<<str
<?php
namespace {$modelPath};
use App\Models\SoftDeleting\SoftDeletes;
class {$modelName} extends Model {
		
		use SoftDeletes;
		
		$relString
		
}
str;
	
		
		
		return file_put_contents(app_path('modules'.str_replace('\\', DIRECTORY_SEPARATOR, $this->model->model_path)), $modelString);
	}
	
	public function destroy()
	{
		//rename($oldname, $newname);
	}
	
	
	
}