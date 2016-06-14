<?php
namespace Simon\Model\Services\Model;
use Illuminate\Database\Eloquent\Collection;
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

	public function requestModel($id,Request $Request)
	{
		$model = $this->find($id);
		if ($model->uri)
		{
			$uri = array_filter($model->uri,function($value) use ($Request) {
				return $Request->is($value);
			});

			if (empty($uri))
			{
				return null;
			}
		}
		return $model;
	}

	/**
	 * 获取继承的模型id
	 * @param $id
	 * @return mixed
	 */
	public function subExtendId($id)
	{
		return ModelRelation::where('extend_id',$id)->lists('model_id')->toArray();
	}

	public function allModelId($mainId)
	{
		$ids = $this->subExtendId($mainId);
		$ids[] = $mainId;
		return $ids;
	}
	
	public function requestModelAndFields($id,Request $Request)
	{
		$model = $this->requestModel($id,$Request);
		//获取字段
		$fields = $this->requestFields($model,$Request);
		return compact('model','fields');
	}
	
	/**
	 * 获取子模型
	 * @param $id
	 * @param Request $Request
	 * @return mixed
	 */
//	public function subModel($id,Request $Request)
//	{
//		//获取继承id
//		$modelIds = ModelRelation::where('extend_id',$id)->lists('model_id')->toArray();
//
//		if (empty($modelIds))
//		{
//			return null;
//		}
//		//这里先使用id排序，其实还是需要sort字段，后期添加
//		$models = $this->model->whereIn('id',$modelIds)->orderBy('id','desc')->get();
//
//		//过滤uri
//		return $models->filter(function($model) use ($Request){
//			//匹配uri模式
//			if ($model->uri)
//			{
//				$uri = array_filter($model->uri,function($value) use ($Request) {
//					return $Request->is($value);
//				});
//
//				if (empty($uri))
//				{
//					return false;
//				}
//			}
//			return true;
//		});
//
//	}


	public function fields(\Simon\Model\Models\Model $Model)
	{
		return $Model->belongsToManyField()->where('status',Field::STATUS_OPEN)->orderBy('sort','DESC')->get();
	}

	/**
	 * @param \Simon\Model\Models\Model $Model
	 * @param Request $Request
	 * @return mixed
	 */
	public function requestFields(\Simon\Model\Models\Model $Model,Request $Request)
	{
		$fields = $Model->belongsToManyField()->where('fields.status',Field::STATUS_OPEN)->orderBy('fields.sort','DESC')->get();

		//获取匹配uri
		$fields = $fields->filter(function($item) use ($Request){
			//主键不受限制
			if ($item->is_primary !== 2)
			{
				return true;
			}
			//匹配uri模式
			if ($item->uri)
			{
				$uri = array_filter($item->uri,function($value) {
					return $Request->is($value);
				});
				if (empty($uri))
				{
					return false;
				}
			}
			return true;
		});
		
		//增加instance实例
		return $fields->each(function($field) use ($Model) {
			$namespace = 'Simon\Model\Fields\Option\\'.$field->type;
			$field->instance = new $namespace($field,$Model);
		});
	}
}