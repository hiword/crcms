<?php
namespace Simon\Model\Services;
use App\Services\Service;
use Simon\Model\Models\Model;
use Illuminate\Database\Eloquent\Collection;
use Simon\Model\Models\Field;
use Illuminate\Support\Facades\DB;
abstract class Element extends Service
{
	/**
	 * 关联数据存储
	 * @var array $assoces
	 */
	protected $assoces = [];
	
	/**
	 * 数据字段
	 * @var Simon\Model\Models\Field
	 * @author simon
	 */
	protected $fields = null;
	
	
	public function __construct(Model $model,Collection $fields,array $data = [])
	{
		parent::__construct();
		$this->model = $model;
		$this->data = $data;
		//$this->fields = $this->fieldInstance($fields);
		$this->fields = $fields;
	}
	
	/**
	 * 字段instance实例
	 * @param Collection $fields
	 * @author simon
	 */
	protected function fieldInstance(Collection $fields)
	{
		$fields->each(function($field){
			$namespace = 'Simon\Model\Fields\Option\\'.$field->type;
			$field->instance = new $namespace($field,$this->model);
		});
		return $fields;
	}
	
	/**
	 * 数据入库过滤(存储和修改)
	 * @param array $postData
	 * @return string[]
	 * @author simon
	 */
	protected function filterStorageValue(array $postData)
	{
		$keys = array_keys($postData);
	
		$data = [];
	
		$fields = $this->fields->filter(function($item) use ($keys){
			return in_array($item->name, $keys,true);
		});
	
		foreach ($fields as $item)
		{
			//过滤value值
			$value = $item->instance->filter($postData[$item->name]);
			//多选
			if('Multiselect' === $item->type)
			{
				if ($item->setting->store_type === 'table')
				{
					$this->combineAssoceTable($item->setting->store_table, $value, $item->name);
					continue;
				}
				elseif ($item->setting->store_type === 'field')
				{
					$value = implode(',',$value);
				}
			}

			$data[$item->name] = $value;
		}
		return $data;
	}
	
	/**
	 * 组合关联数据表
	 * @param string $expression
	 * @param string $value
	 * @param string $field
	 * @author simon
	 */
	protected function combineAssoceTable($expression,$value,$field)
	{
		$expression = explode(',', $expression);
		$assoce = [];
		$assoce['table'] = $expression[0];
		$assoce['fork_field'] = $expression[1];
		$assoce['other_field'] = $expression[2];
		$assoce['other_value'] = $value;
		$assoce['type_field'] = $expression[3];
		$this->assoces[] = $assoce;
	}
	
	/**
	 * 存储中间关联表
	 * @param string|number $forkId
	 * @author simon
	 */
	protected function storeAssoceTable($forkId)
	{
		foreach ($this->assoces as $assoce)
		{
			foreach ($assoce['other_value'] as $v)
			{
				DB::table($assoce['table'])->insert([
						$assoce['fork_field'] => $forkId,
						$assoce['other_field'] => $v,
						$assoce['type_field'] => $this->model->table_name,
				]);
			}
		}
	}
}