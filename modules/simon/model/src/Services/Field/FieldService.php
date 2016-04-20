<?php
namespace Simon\Model\Services\Field;
use Simon\Model\Services\Field;
use Cron\FieldInterface;
use Simon\Model\Models\Field as FieldModel;
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
	
}