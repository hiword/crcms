<?php
namespace Simon\Model\Fields;
use Simon\Model\Models\Model;
use Illuminate\Database\Eloquent\Collection;
use Simon\Model\Models\Field;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
class Factory
{
	protected $model = null;
	
	protected $fields = [];
	
	protected $request = null;
	
	protected $data = [];
	
	protected $assoces = [];
	
	public function __construct(Model $model,Collection $fields,Request $Request,array $data = [])
	{
		$this->model = $model;
		$this->setFieldInstance($fields);
		$this->request = $Request;
		$this->data = $data;
	}
	
	protected function setFieldInstance(Collection $fields)
	{
		$this->fields = collect();
		foreach ($fields as $key=>$field)
		{
			
			//匹配uri模式
			if ($field->uri)
			{
				$uri = array_filter($field->uri,function($value) {
					return app('request')->is($value);
				});
						
				if (empty($uri))
				{
					continue;
				}
			}
			
			$namespace = 'Simon\Model\Fields\Option\\'.$field->type;
			$field->instance = new $namespace($field,$this->model);
			
			$this->fields->push($field);
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
	
	protected function filterValue(array $data)
	{
		foreach ($data as $key=>$value)
		{
			if (false === $this->fields->search(function($item,$k) use ($key){
				return $key === $item->name;
			}))
			{
				continue;
			}
			
			if (is_array($value) && false !== $index = $this->fields->search(function($item,$k) use ($key){
				return 'Multiselect' === $item->type;
			}))
			{
				$field = $this->fields->get($index);
				if ($field->setting->store_type === 'table')
				{
// 					$this->assoces[$key] = $this->assoc($field->setting->store_table); 
					$this->assoces[$key]['expression'] = $field->setting->store_table; 
					$this->assoces[$key]['value'] = $value;
					continue;
				}
				elseif ($field->setting->store_type === 'field')
				{
					$value = implode(',',$field->store_type);
				}
			}
			
			$this->data[$key] = $value;
		}
	}
	
	public function store(array $data,$mainId = 0,$primary = null)
	{
		
		$this->filterValue($data);
		
		//附加表主键自动关联
		if ($mainId && $primary)
		{
// 			$key = $this->fields->search(function($item,$key){
// 				return $item->is_primary===Field::PRIMARY_NOT ? false : true;
// 			});
			$this->data[$primary] = $mainId;
		}
		
		//录入数据
		$insertId = DB::table($this->model->table_name)->insertGetId($this->data);
		
		if ($this->assoces)
		{
			$assoced = $this->assoced($insertId);
			foreach ($assoced as $table=>$values)
			{dd($values);
				DB::table($table)->insert($values);
			}
		}
		
		return $insertId;
// 		dd($this->assocValue(5,$data));
		
		dd($this->data,$this->assoces);
		
		
		$this->multiselect();
		$store = $this->handle($data);
		$insertId = 10;
// 		$insertId = DB::table($this->model->table_name)->insertGetId($store['result']);
		
		if ($store['assoc'])
		{
			foreach ($store['assoc'] as $field=>$assoc)
			{
				$temp = [];
				foreach ($assoc as $table=>$value)
				{
					foreach ($data[$field] as $v)
					{
						$temp[] = str_replace(['{Id}','{Value}'],[$insertId,$v],$value);
					}
				}
			}
		}
		
// 		$store = [];
		
// 		foreach ($this->fields as  $field)
// 		{
// 			if (!isset($data[$field->name]))
// 			{
// 				continue;
// 			}
			
// 			//多选特例
// 			if ($field->type === 'Multiselect')
// 			{
// 				if ($field->setting->store_type === 'table')
// 				{
// 					$accossTable[$field->name] = explode(',', $setting->store_table);
// 					$assoc = $this->accossTable($accoss, $data);
// 				}
// 				elseif ($field->setting->store_type === 'feld')
// 				{
// 					$store[$field->name] = implode(',', $data[$field->name]);
// 				}
// 			}
// 			else
// 			{
// 				$store[$field->name] = $data[$field->name];
// 			}
// 		}
		
// 		$insertId = DB::table($model->table_name)->insertGetId($store);
		
// 		if ($insertId && isset($accossTable)) 
// 		{
// 			$this->accossTable($accossTable, $insertId, $data);
// 		}
	}
	
	protected function assoced($insertId)
	{
		$expressionValue = [];
		
		foreach ($this->assoces as $field=>&$assoc)
		{
			foreach ($assoc['value'] as $k=>$value)
			{
				$expression = str_replace(['{Id}','{Value}'],[$insertId,$value],$assoc['expression']);
				
				$accoced = $this->assoc($expression);
				$table = array_shift($accoced);
				//此处有问题
				$expressionValue[$table] = array_merge($accoced,$expressionValue[$table]);
			}
		}
		
		return $expressionValue;
	}
	
	protected function assoc($assoc)
	{
		$assoc = explode(',',$assoc);
		
		//get table
		$table = array_shift($assoc);
		
		$ts = [];
		foreach ($assoc as $t)
		{
			$t = explode(':', $t);
			$ts = array_merge($ts,[$t[0]=>$t[1]]);
		}
		
		return [$table,$ts];
	}
	
	protected function assocValue($insertId,array $data)
	{
// 		dd($values);
		foreach ($this->assoces as $field=>&$assoc)
		{
			$temp = [];
			foreach ($assoc as $table=>$value)
			{
				foreach ($data[$field] as $v)
				{
					$temp[] = str_replace(['{Id}','{Value}'],[$insertId,$v],$value);
				}
			}
// 			$array[$table]
// 			$assoc = $temp;
		}
	}
	
	protected function accossTable($accoss,$data)
	{
		$result = [];
		
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
					$ats[] = str_replace(['{Value}'], [$value], $ts);
				}
			}
			//DB::table($dbTable)->insert($ats);
			$result[$dbTable] = $ats;
		}
		return $result;
	}
	
// 	protected function multiselect(Field $field)
// 	{
// 		$setting = $field->setting;
// 		if ($setting->store_type === 'table')
// 		{
// 			$store_table[$field->name] = explode(',', $setting->store_table);
// 		}
// 		elseif ($setting->store_type === 'feld')
// 		{
// 			$data[$field->name] = implode(',', $this->data[$model->mark][$field->name]);
// 		}
// 	}
	
	public function data()
	{
		
	}
}