<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 16-6-1
 * Time: 下午6:52
 */
namespace Simon\Model\Fields\Factory;
use Simon\Model\Fields\Factory;
use Simon\Model\Models\Model;
use Illuminate\Database\Eloquent\Collection;
use Simon\Model\Models\Field;
use Simon\Model\Fields\FactoryInterface;
use Illuminate\Support\Facades\DB;
use App\Services\Traits\StoreTrait;
use App\Services\Traits\UpdateTrait;
use App\Services\Traits\DestroyTrait;

class Database extends Factory implements FactoryInterface
{

	use StoreTrait,UpdateTrait,DestroyTrait;
	
	const STORE = 'store';
	
	const UPDATE = 'update';
	
	protected $assoces = [];
	
	protected function setAssoceTable($expression,$value,$field)
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
	
	protected function filterValue()
	{
		$keys = array_keys($this->data);
		
		$data = [];
		
		$fields = $this->fields->filter(function($item) use ($keys){
			return in_array($item->name, $keys,true);
		});
		
		foreach ($fields as $item)
		{
			$value = $this->data[$item->name];
			
			if('Multiselect' === $item->type)
			{
				//filter
				$value = $item->instance->filter($value);
				
				if ($item->setting->store_type === 'table')
				{
					$this->setAssoceTable($item->setting->store_table, $value, $item->name);
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
	
	protected function setMiddleAssoceTable($forkId)
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
	
	protected function destroyBeforeAssoceTable($forkId)
	{//tests中间表还差一个outside+_type 这里用表名代替命名空间
		foreach ($this->assoces as $assoce)
		{
			DB::table($assoce['table'])->where($assoce['fork_field'],$forkId)->where($assoce['type_field'],$this->model->table_name)->delete();
		}
	}
	
	/**
	 * 
	 * @param number $mainId
	 * @author root
	 */
	public function store($mainId = 0)
	{
		// 数据过滤
		$data = $this->filterValue();
		
		//附加表主键自动关联主键
		if ($mainId)
		{
			$primary = $this->fields->get($this->fields->search(function($item){
				return $item->is_primary !== 2;
			}))->name;
			$data[$primary] = $mainId;
		}
		
		//添加默认数据
		$data['model_id'] = $this->model->id;
		$data = array_merge($data,$this->builtExternalDataStore());
		
		//录入数据
		$insertId = DB::table($this->model->table_name)->insertGetId($data);

		//多选时，数据中间表写入
		if ($this->assoces)
		{
			//防止非自增数据，获取不到id值，则拿出最后一条
			if (!$insertId)
			{
				$insertId = DB::table($this->model->table_name)->orderBy($primary,'desc')->take(1)->value($primary);
			}
			
			$this->setMiddleAssoceTable($insertId);
		}
		
		return $insertId;
	}
	
	public function update($id)
	{
		$data = $this->filterValue();

		$data = array_merge($data,$this->builtExternalDataUpdate());
		
		//primary
		$primary = $this->fields->get($this->fields->search(function($item){
			return $item->is_primary !== 2;
		}))->name;
		
		//录入数据
		DB::table($this->model->table_name)->where($primary,$id)->update($data);
		
		//多选时，数据中间表写入
		if ($this->assoces)
		{
			//delete Before mult
			$this->destroyBeforeAssoceTable($id);
			$this->setMiddleAssoceTable($id);
		}
		
		return true;
	}

}