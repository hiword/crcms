<?php
namespace Simon\Model\Fields\Option;
use Simon\Model\Fields\Field;
use Simon\Model\Fields\FieldInterface;
use Illuminate\Support\Facades\DB;
class Multiselect extends Field implements FieldInterface
{
	
	/**
	 * 
	 * @var string
	 * @author simon
	 */
	protected $type = 'multiselect';
	
	/**
	 * 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\Field::arrayForm()
	 * @author simon
	 */
	public function arrayForm($value = null)
	{
		$form = parent::arrayForm($value);
		
		//多选默认值multi_value
		$form['multi_value'] = $value ? (array)$value : explode(',',$this->field->setting->default_value);
		return $form;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Fields\Field::attributes()
	 * @author simon
	 */
	protected function attributes($value = null)
	{
		$this->attributes['type'] = $this->field->setting->mult_type;
		$this->attributes['name'] = $this->attributeName().'[]';
		
		//防止用户输入value属性
		unset($this->attributes['value']);
	}
	
	public function filter($value)
	{
		if (is_array($value))
		{
			return array_map(function($v){
				return xss_clean($v);
			},$value);
		}
		else
		{
			return xss_clean($value);
		}
	}
	
	/**
	 * 解析显示的字段存储
	 * @param mixed $value
	 * @return array
	 * @author simon
	 */
	protected function parseShowFieldStore(array $value)
	{
		$value = is_array($value) ? $value : explode(',', $value);
		
		$parseValue = [];
		
		foreach ($this->field->setting->option as $op)
		{
			if(preg_match('/from\s+([^\s]+)[\s+|:]/imU',$op,$match))
			{
				$op = explode(':', $op);
				$showField = array_pop($op);
				$ov = explode(',', $showField);
		
				$parse = rtrim(str_repeat('?,', count($value)),',');
		
				$table = trim($match[1]);
				//查询当前值的所有数据
				$results = DB::table($table)->whereIn($ov[0],$value)->lists($ov[1],$ov[0]);
				
				!empty($results) && $parseValue += $results;
			}
			else
			{
				$op = explode(':', $op);
		
				//返回存在值
				if (in_array($op[1], $value))
				{
					$parseValue[$op[0]] = $op[1];
				}
		
			}
		}
		
		return $parseValue;
	}
	
	/**
	 * 解析获取数据表存储的数据
	 * @param string|numeric $primaryValue
	 * @param string $primaryKey
	 * @author simon
	 */
	protected function parseShowTableStore($primaryValue,$primaryKey = 'id')
	{
		$parseValue = [];
		
		foreach ($this->field->setting->option as $op)
		{
			if(preg_match('/from\s+([^\s]+)[\s+|:]/imU',$op,$match))
			{
				//中间关联表信息
				$middle = explode(',', $this->field->setting->store_table);
				$middle_table = $middle[0];
				$middle_fork_id = $middle[0].'.'.explode(':',$middle[1])[0];
				$middle_other_id = $middle[0].'.'.explode(':',$middle[2])[0];
				$middle_fork_type = $middle[0].'.'.$middle[3];
				$middle_fork_field = $middle[0].'.'.$middle[4];
		
				//先查出中间表数据
				//当前数据值=中间表数据值 & typeid=数据表名 & field = 数据表字段
				$otherId = DB::table($middle_table)->where($middle_fork_id,$primaryValue)->where($middle_fork_type,$this->model->table_name)->where($middle_fork_field,$this->field->name)->lists($middle_other_id);
		
				/*//查出当前数据*/
				$table = trim($match[1]);
				$field = explode(',', explode(':',$op)[count(explode(':',$op))-1]);
				$relation_other_id = $table.'.'.$field[0];
				$relation_show_name = $table.'.'.$field[1];
		
				$results = (array)DB::table($table)->select($relation_other_id,$relation_show_name)->whereIn($relation_other_id,$otherId)->lists($relation_show_name,$relation_other_id);
		
				!empty($results) && $parseValue += $results;
			}
			else
			{
				$op = explode(':', $op);
		
				//返回存在值
				if (in_array($op[1], $value))
				{
					$parseValue[$op[0]] = $op[1];
				}
			}
		}
		return $parseValue;
	}
	
	public function show($value,$primaryKey = 'id')
	{
		//$this->parseShowTableStore($value,$primaryKey) 这里的value是主键的值，不是当前的字段值
		return $this->field->setting->store_type==='table' ? $this->parseShowTableStore($value,$primaryKey) : $this->parseShowFieldStore($value);
	}
}