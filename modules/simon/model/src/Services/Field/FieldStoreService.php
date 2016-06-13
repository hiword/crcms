<?php
namespace Simon\Model\Services\Field;
use Simon\Model\Services\Field;
use Simon\Model\Services\Field\Interfaces\FieldStoreInterface;
use Simon\Model\Models\ModelField;
class FieldStoreService extends Field implements FieldStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		
		//format
// 		if (!empty($data['validate_rule']))
// 		{
// 			$data['validate_rule'] = enter_format_array($data['validate_rule']);
// 		}
// 		if (!empty($data['form_attr']))
// 		{
// 			$formAttr = enter_format_array($data['form_attr']);
// 			$newFormAttr = [];
// 			foreach ($formAttr as $value)
// 			{
// 				$value = explode(':',$value);
// 				$newFormAttr[$value[0]] = str_replace(',',' ',$value[1]);
// 			}
// // 			$data['form_attr'] = array_map(function($value){return str_replace(',',' ',trim($value));},explode("\n",str_replace("\r\n","\n",$data['form_attr'])));
// 		}
// 		else
// 		{
// 			$newFormAttr = [];
// 		}
		
		if (!empty($data['setting']['option']))
		{
			$data['setting']['option'] = enter_format_array($data['setting']['option']);
		}

		//save
		$this->model->name = uniqid($data['name']);
		$this->model->type = $data['type'];
		$this->model->alias = $data['alias'];
		$this->model->validate_rule = enter_format_array($data['validate_rule']);
		$this->model->attribute = enter_format_array($data['form_attr']);;
		$this->model->uri = enter_format_array($data['uri']);
		$this->model->setting = $data['setting'];
		$this->model->name = $data['name'];
		$this->model->tip = $data['tip'];
		$this->model->sort = $data['sort'];
		$this->model->is_primary = $data['is_primary'];
		$this->model->status = $data['status'];
		$this->model->option = isset($data['option']) ? $data['option'] : [];
		$this->model->save();
		
		if (!empty($data['model_id']))
		{
			foreach ($data['model_id'] as $value)
			{
				ModelField::create(['model_id'=>$value,'field_id'=>$this->model->id]);
			}
		}
		
		return $this->model;
	}
	
}