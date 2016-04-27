<?php
namespace Simon\Model\Services\Model;
use Simon\Model\Services\Model;
use Simon\Model\Services\Model\Interfaces\ModelUpdateInterface;
use Simon\Model\Models\ModelRelation;
class ModelUpdateService extends Model implements ModelUpdateInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author simon
	 */
	public function update($id, array $data)
	{
		// TODO Auto-generated method stub
		$this->model = $this->model->findOrFail($id);
		
		$this->model->name = $data['name'];
		$this->model->mark = $data['mark'];
		$this->model->table_name = $data['table_name'];
		$this->model->engine = $data['engine'];
		$this->model->type = $data['type'];
		$this->model->status = $data['status'];
		$this->model->uri = enter_format_array($data['uri']);
		$this->model->remark = $data['remark'];
		
		$this->model->save();
		//
		if(!empty($data['extends']) && $data['type'] == \Simon\Model\Models\Model::TYPE_APPEND)
		{
			ModelRelation::where('model_id',$id)->delete();
			$this->storeExtends($data['extends'], $id);
		}
	}
	
}

