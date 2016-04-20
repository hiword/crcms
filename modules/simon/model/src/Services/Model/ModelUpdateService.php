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
		$this->model->where('id',$id)->update([
			'name'=>$data['name'],
			'mark'=>$data['mark'],
			'table_name'=>$data['table_name'],
			'engine'=>$data['engine'],
			'type'=>$data['type'],
			'status'=>$data['status'],
			'remark'=>$data['remark'],
		]);
		
		//
		if(!empty($data['extends']) && $data['type'] == \Simon\Model\Models\Model::TYPE_APPEND)
		{
			ModelRelation::where('model_id',$id)->delete();
			$this->storeExtends($data['extends'], $id);
		}
	}
	
}

