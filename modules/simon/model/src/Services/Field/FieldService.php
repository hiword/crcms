<?php
namespace Simon\Model\Services\Field;
use Simon\Model\Services\Field;
use Simon\Model\Models\Field as FieldModel;
use Simon\Model\Services\Field\Interfaces\FieldInterface;
class FieldService extends Field implements FieldInterface
{
	
	public function paginate(array $appends = [])
	{
		$paginate = $this->model->orderBy(FieldModel::CREATED_AT,'desc')->paginate();
		
		$items = $paginate->items();
		
		if ($items)
		{
			foreach ($items as $item)
			{
				$item->models = $this->models($item);
			}
		}
		
		return ['models'=>$items,'page'=>$paginate->appends($appends)->render()];
	}
	
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}
	
	public function status() 
	{
		return FieldModel::STATUS;
	}
	
	public function primary() 
	{
		return FieldModel::PRIMARY;
	}
	
	public function models(FieldModel $Field)
	{
		return $Field->belongsToManyModel()->lists('name','id')->toArray();
	}
	
	public function function_name($param) 
	{
		;
	}
}