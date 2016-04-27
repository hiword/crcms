<?php
namespace Simon\Model\Services\Model;
use Simon\Model\Services\Model\Interfaces\ModelInterface;
use Simon\Model\Services\Model;
use Simon\Model\Models\ModelRelation;
use Simon\Model\Models\Field;
use Illuminate\Http\Request;
class ModelService extends Model implements ModelInterface
{
	
	public function find($id) 
	{
		return $this->model->findOrFail($id);
	}
	
	public function lists() 
	{
		return $this->model->orderBy(\Simon\Model\Models\Model::CREATED_AT,'desc')->get();
	}
	
	
	public function status() 
	{
		return \Simon\Model\Models\Model::STATUS;
	}
	
	public function type() 
	{
		return \Simon\Model\Models\Model::TYPE;
	}
	
	public function engine() 
	{
		return \Simon\Model\Models\Model::ENGINE;
	}
	
	public function extend($id = 0) 
	{
		if ($id)
		{
			$this->model = $this->model->where('id','<>',$id);
		}
		
		return $this->model->where('type',\Simon\Model\Models\Model::TYPE_MAIN)->lists('name','id')->toArray();
	}
	
	public function alreadyExtend($id)
	{
		return ModelRelation::where('model_id',$id)->lists('extend_id')->toArray();
	}
	
	public function beExtend($id,Request $Request)
	{
		$modelIds = ModelRelation::where('extend_id',$id)->lists('model_id')->toArray();
		$models = $this->model->whereIn('id',$modelIds)->get();
		$newIds = [];
		foreach ($models as $model)
		{
			//匹配uri模式
			if ($model->uri)
			{
				$uri = array_filter($model->uri,function($value) use ($Request) {
					return $Request->is($value);
				});
						
				if (empty($uri))
				{
					continue;
				}
			}
			
			$newIds[] = $model->id;
		}
		
		return $newIds;
	}
	
	public function fields(\Simon\Model\Models\Model $Model) 
	{
		return $Model->belongsToManyField()->where('status',Field::STATUS_OPEN)->orderBy('sort','DESC')->get();
	}
}