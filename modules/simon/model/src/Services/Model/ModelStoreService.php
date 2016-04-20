<?php
namespace Simon\Model\Services\Model;
use Simon\Model\Services\Model;
use Simon\Model\Services\Model\Interfaces\ModelStoreInterface;
class ModelStoreService extends Model implements ModelStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		$this->model->name = $data['name'];
		$this->model->mark = $data['mark'];
		$this->model->table_name = $data['table_name'];
		$this->model->engine = $data['engine'];
		$this->model->type = $data['type'];
		$this->model->remark = $data['remark'];
		$this->model->status = $data['status'];
		$this->model->save();
		
		//extends
		if (!empty($data['extends']) && $data['type'] == \Simon\Model\Models\Model::TYPE_APPEND)
		{
			$this->storeExtends($data['extends'], $this->model->id);
		}
		
		return $this->model;
	}

	
	
}

