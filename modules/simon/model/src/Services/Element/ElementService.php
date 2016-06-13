<?php
namespace Simon\Model\Services\Element;
use Simon\Model\Services\Element;
use Simon\Model\Services\Element\Interfaces\ElementInterface;
use Simon\Model\Models\Model;
use Illuminate\Database\Eloquent\Collection;
use Simon\Model\Fields\Factory\View;
use Illuminate\Support\Facades\DB;
class ElementService extends Element implements ElementInterface
{
	
	protected function getPrimaryKey()
	{
		return $this->fields->get($this->fields->search(function($item,$key){
			return $item->is_primary !== 2;
		}))->name;
	}
	
	public function selectOptions()
	{
		$tableName = $this->model->table_name;
		
		//primary
		$primary = $this->fields->get($this->fields->search(function($item,$key){
			return $item->is_primary !== 2;
		}))->name;
		
		//get list option
		$databaseFields = $this->fields->filter(function($item){
			if(empty($item->option))
			{
				return false;
			}
			if (!in_array('list',$item->option,true))
			{
				return false;	
			}
			if ($item->type==='Multiselect' && $item->setting->store_type!=='field')
			{
				return false;
			}
			return true;
		})->map(function($item) use ($tableName){
			return ['as_field'=>$tableName.'.'.$item->name,'field'=>$item->name];
// 			return $tableName.'.'.$item->name." as {$tableName}.{$item->name}";
		});
		
		//MultField
		$databaseMultField = $this->fields->filter(function($item){
			if($item->type==='Multiselect' && $item->setting->store_type==='table')
			{
				return true;
			}
			return false;
		})->map(function($item) use ($tableName,$primary){
				
			//获取SQL查询语句的列
			$selects = array_filter($item->setting->option,function($value){
				return stripos($value, 'select')!==false && stripos($value, 'from')!==false;
			});
			
			$expressions = [];$i=0;$expression = [];
			foreach($selects as $select)
			{
				if(preg_match('/from\s+([^\s]+)[\s+|:]/imU',$select,$match))
				{
					$field = explode(',', explode(':',$select)[count(explode(':',$select))-1]);
					$table = trim($match[1]);
					$expression['field'] = $item->name;
					$expression['relation_table'] = $table;
					$expression['relation_other_id'] = $table.'.'.$field[0];
					$expression['relation_show_name'] = $table.'.'.$field[1];
					$expression['main_fork_id'] = $primary;
					$expression['main_table'] = $tableName;
					//中间关联表信息
					$middle = explode(',', $item->setting->store_table);
					$expression['middle_table'] = $middle[0];
					$expression['middle_fork_id'] = $middle[0].'.'.explode(':',$middle[1])[0];
					$expression['middle_other_id'] = $middle[0].'.'.explode(':',$middle[2])[0];
					$expression['middle_fork_type'] = $middle[0].'.'.$middle[3];
					$expression['middle_fork_type_value'] = $tableName;
					$expressions[$i] = $expression;
					$i+=1;
				}
			}
			return $expressions;
		});
		$databaseAsField = $databaseFields->pluck('as_field')->all();
		$databaseField = $databaseFields->pluck('field')->all();
		return ['mult_field'=>(array)$databaseMultField->first(),'table'=>$this->model->table_name,'field'=>['as_field'=>$databaseAsField,'field'=>$databaseField],'primary'=>$primary];
	}
	
	public function lists()
	{
		//get list option
// 		$databaseField = $this->fields->filter(function($item){
// 			return $item->option && in_array('list',$item->option,true) && $item->type!='Multiselect';
// 		})->map(function($item) {
// 			return $this->model->table_name.'.'.$item->name;
// 		});
	}
	
	public function find($valueId)
	{
		//get PrimaryKey
		$primary = $this->getPrimaryKey();
	
		//get Data
		$data = (array)DB::table($this->model->table_name)->where($primary,$valueId)->first();
	
		foreach ($this->fields as $item)
		{
			if($item->type === 'Multiselect')
			{
				$data[$item->name] = $this->multi($item,$valueId,isset($data[$item->name]) ? $data[$item->name] : '');
			}
		}
	
		return $data;
	}
	
	/**
	 *
	 * @param Field $item
	 * @param string $value
	 * @author simon
	 */
	protected function multi($item,$valueId,$value = '')
	{
		if ($item->setting->store_type === 'table')
		{
			$expression = $item->setting->store_table;
			list($table,$forkId,$otherId,$type) = explode(',', $expression);
			$data = DB::table($table)->where($forkId,$valueId)->where($type,$this->model->table_name)->lists($otherId);
		}
		elseif ($item->setting->store_type === 'field')
		{
			$data = explode(',', $value);
		}
		return $data;
	}

	public function view(Model $model,Collection $fields)
	{
		return (new View($model, $fields))->html();
	}

	
}