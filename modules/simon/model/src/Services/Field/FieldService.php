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
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
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
}