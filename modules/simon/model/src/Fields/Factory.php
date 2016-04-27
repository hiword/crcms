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
	
	public function validator($id = 0)
	{
		$validateRule = [];
		foreach ($this->fields as $field)
		{
			$validateRule[$field->name] = $field->instance->validateRule($id);
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
	
	public function store(array $data,$primary,$mainId = 0)
	{
		//过滤数据处理
		$this->filterValue($data);
		
		//附加表主键自动关联
		if ($mainId)
		{
			$this->data[$primary] = $mainId;
		}
		
		//录入数据
		$insertId = DB::table($this->model->table_name)->insertGetId($this->data);

		//多选table关联
		if ($this->assoces)
		{
			//附加表如果，id不是autoIncrement的话，则会有问题，得不到id的最后写入值
			//防止非自增数据，获取不到id值，则拿出最后一条
			if (!$insertId)
			{
				$insertId = DB::table($this->model->table_name)->orderBy($primary,'desc')->take(1)->value($primary);
			}
			$assoced = $this->assoced($insertId);
			foreach ($assoced as $table=>$values)
			{
				DB::table($table)->insert($values);
			}
		}
		
		return $insertId;
	}
	
	/**
	 * 
	 * @param unknown $insertId
	 * @author simon
	 */
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
				
				$expressionValue[$table] = array_merge($accoced,isset($expressionValue[$table]) ? $expressionValue[$table] : []);
			}
		}
		
		return $expressionValue;
	}
	
	/**
	 * 
	 * @param unknown $assoc
	 * @author simon
	 */
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
	
}