<?php
namespace Simon\Model\Services\Field;
use Simon\Model\Services\Field;
use Simon\Model\Services\Field\Interfaces\FieldUpdateInterface;
use Simon\Model\Models\ModelField;
class FieldUpdateService extends Field implements FieldUpdateInterface
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
		
		if (!empty($data['setting']['option']))
		{
			$data['setting']['option'] = enter_format_array($data['setting']['option']);
		}
		
		//save
		$this->model->name = $data['name'];
		$this->model->type = $data['type'];
		$this->model->alias = $data['alias'];
		$this->model->validate_rule = enter_format_array($data['validate_rule']);
		$this->model->attribute = enter_format_array($data['form_attr']);
		$this->model->uri = enter_format_array($data['uri']);
		$this->model->setting = $data['setting'];
		$this->model->name = $data['name'];
		$this->model->tip = $data['tip'];
		$this->model->sort = $data['sort'];
		$this->model->is_primary = $data['is_primary'];
		$this->model->status = $data['status'];
		
		$this->model->save();
		
		if (!empty($data['model_id']))
		{
			//先删除原来的
			ModelField::where('field_id',$id)->delete();
			
			//添加新的
			foreach ($data['model_id'] as $value)
			{
				ModelField::create(['model_id'=>$value,'field_id'=>$this->model->id]);
			}
		}
		
		return $this->model;
	}

	
	
	
}