<?php
namespace Simon\Model\Fields;
use Simon\Model\Models\Model;
use Illuminate\Database\Eloquent\Collection;
use Simon\Model\Models\Field;
use Illuminate\Support\Facades\DB;
class Factory
{
	protected $model = null;
	
	protected $fields = [];
	
	public function __construct(Model $model,Collection $fields)
	{
		$this->model = $model;
		$this->setFieldInstance($fields);
	}
	
	protected function setFieldInstance(Collection $fields)
	{
		
		foreach ($fields as $key=>$field)
		{
			$namespace = 'Simon\Model\Fields\Option\\'.$field->type;
			$field->instance = new $namespace($field,$this->model);
			
			$this->fields[$key] = $field;
		}
		
	}
	
	public function view($type = 'htmlForm',$value = null)
	{
		$views = [];
		foreach ($this->fields as $field)
		{
			$views[$field->name] = call_user_func_array([$field->instance,$type],[$value]);
		}
		return $views;
	}
	
	public function validator()
	{
		$validateRule = [];
		foreach ($this->fields as $field)
		{
			$validateRule[$field->name] = $field->instance->validateRule();
		}
		return $validateRule;
	}
	
	public function store(array $data)
	{
		$store = [];
		
		foreach ($this->fields as  $field)
		{
			if (!isset($data[$field->name]))
			{
				continue;
			}
			
			//多选特例
			if ($field->type === 'Multiselect')
			{
				if ($field->setting->store_type === 'table')
				{
					$accossTable[$field->name] = explode(',', $setting->store_table);
				}
				elseif ($field->setting->store_type === 'feld')
				{
					$store[$field->name] = implode(',', $data[$field->name]);
				}
			}
			else
			{
				$store[$field->name] = $data[$field->name];
			}
		}
		
		$insertId = DB::table($model->table_name)->insertGetId($store);
		
		if ($insertId && isset($accossTable)) 
		{
			$this->accossTable($accossTable, $insertId, $data);
		}
	}
	
	protected function accossTable($accoss,$insertId,$data)
	{
		foreach ($accoss as $key=>$table)
		{
			$dbTable = array_shift($table);
		
			$ts = [];
			foreach ($table as $t)
			{
				$t = explode(':', $t);
				$ts = array_merge($ts,[$t[0]=>$t[1]]);
			}
		
			if (is_array($data[$key]))
			{
				$ats = [];
				foreach ($data[$key] as $value)
				{
					$ats[] = str_replace(['{Id}','{Value}'], [$insertId,$value], $ts);
				}
			}
			DB::table($dbTable)->insert($ats);
		}
	}
	
	protected function multiselect(Field $field)
	{
		$setting = $field->setting;
		if ($setting->store_type === 'table')
		{
			$store_table[$field->name] = explode(',', $setting->store_table);
		}
		elseif ($setting->store_type === 'feld')
		{
			$data[$field->name] = implode(',', $this->data[$model->mark][$field->name]);
		}
	}
	
	public function data()
	{
		
	}
}