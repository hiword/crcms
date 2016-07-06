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
	
	protected function formatMultField(Collection $fields)
	{
		
		//获取外键数据表字段
		$databaseMultField = $fields->filter(function($item){
			if($item->type === 'Multiselect' && $item->setting->store_type === 'table')
			{
				return true;
			}
			return false;
		});
		
		//变量申明
		$field_alias = $select_field = $field = $alias = $relation = [];
		
		if (!$databaseMultField->isEmpty())
		{
			$databaseMultField = $databaseMultField->map(function($item){
			
				//获取SQL查询语句的列
				$selects = array_filter($item->setting->option,function($value){
					return stripos($value, 'select')!==false && stripos($value, 'from')!==false;
				});
					
				$expressions = [];$i=0;$expression = [];
				$expressions['relation'] = [];
				$expressions['field'] = [];
				foreach($selects as $select)
				{
					if(preg_match('/from\s+([^\s]+)[\s+|:]/imU',$select,$match))
					{
						$field = explode(',', explode(':',$select)[count(explode(':',$select))-1]);
						$table = trim($match[1]);
						$expression['field'] = $item->name;
						$expression['field_info'] = ['select_field'=>$this->model->table_name.'.'.$item->name,'field'=>$item->name,'alias'=>$item->alias];
						$expression['relation_table'] = $table;
						$expression['relation_other_id'] = $table.'.'.$field[0];
						$expression['relation_show_name'] = $table.'.'.$field[1];
						$expression['main_fork_id'] = $this->getPrimaryKey();
						$expression['main_table'] = $this->model->table_name;
						//中间关联表信息
						$middle = explode(',', $item->setting->store_table);
						$expression['middle_table'] = $middle[0];
						$expression['middle_fork_id'] = $middle[0].'.'.explode(':',$middle[1])[0];
						$expression['middle_other_id'] = $middle[0].'.'.explode(':',$middle[2])[0];
						$expression['middle_fork_type'] = $middle[0].'.'.$middle[3];
						$expression['middle_fork_type_value'] = $this->model->table_name;
						$expression['middle_fork_field'] = $middle[0].'.'.$middle[4];
						$expressions['relation'][$i] = $expression;
							
						$expressions['field'][$i] = ['select_field'=>$this->model->table_name.'.'.$item->name,'field'=>$item->name,'alias'=>$item->alias];
						$i+=1;
					}
				}
				return $expressions;
			});
			
		
			foreach ($databaseMultField as $item)
			{
				$relation = array_merge($relation,$item['relation']);
				foreach ($item['field'] as $values)
				{
					$select_field[] = $values['select_field'];
					$field[] = $values['field'];
					$alias[] = $values['alias'];
				}
			}
			
			//增加主键
			if (!in_array($this->getPrimaryKey(), $select_field,true))
			{
				array_unshift($select_field, $this->model->table_name.'.'.$this->getPrimaryKey());
			}
		
			$field_alias = array_combine($field, $alias);
			
// 			dd($field_alias,$relation,$select_field,$field,$alias);
		}
		
		
		return compact('select_field','field','alias','field_alias','relation');
// 		return ['relation'=>$relation]
		dd($field_alias,$relation,$select_field,$field,$alias);
		$databaseMultField->each(function ($item){
			
		});
// 		$select_field = $databaseMultField->pluck('field')->all();
// 		dd(array_get($select_field,'*.select_field'));
		dd($databaseMultField);
		$field = $databaseFields->pluck('field')->all();
		$alias = $databaseFields->pluck('alias')->all();
		$field_alias = array_combine($field, $alias);
			
		dd($databaseMultField);
		return $databaseMultField;
	}
	
	protected function formatField(Collection $fields)
	{
		//获取本数据表字段
		$databaseFields = $fields->filter(function($item){
			if ($item->type==='Multiselect' && $item->setting->store_type==='table')
			{
				return false;
			}
			return true;
		})->map(function($item) {
			return ['select_field'=>$this->model->table_name.'.'.$item->name,'field'=>$item->name,'alias'=>$item->alias];
		});
		
		$select_field = $field = $alias = $alias = $field_alias = [];
		
		if (!$databaseFields->isEmpty())
		{
			$select_field = $databaseFields->pluck('select_field')->all();
			$field = $databaseFields->pluck('field')->all();
			$alias = $databaseFields->pluck('alias')->all();
			
			$field_alias = array_combine($field, $alias);
			
			//增加主键
			if (!in_array($this->getPrimaryKey(), $select_field,true))
			{
				array_unshift($select_field, $this->model->table_name.'.'.$this->getPrimaryKey());
			}
		}
		
		
		return compact('select_field','field','alias','field_alias');
		
		$multAsFields = $databaseMultField->pluck('field_info.as_field')->all();
		$multFields = $databaseMultField->pluck('field_info.field')->all();
		$multAlias = $databaseMultField->pluck('field_info.alias')->all();
		
		return ['table'=>$tableName,'primary'=>$primary,'field'=>$databaseFields,'mult_field'=>$databaseMultField];
	}
	
	public function selectListOptions()
	{
		$fields = $this->fields->filter(function($item){
			if(empty($item->option))
			{
				return false;
			}
			if (!in_array('list',$item->option,true))
			{
				return false;	
			}
			return true;
		});
		
		$databaseFields= $this->formatField($fields);
// 		dd($databaseFields);
		$databaseMultFields = $this->formatMultField($fields);
			
		$format = [
			'table'=>$this->model->table_name,
			'primary'=>$this->getPrimaryKey(),
			'select_field'=>$databaseFields['select_field'],//这里是因为要查询表，字段也是外键虚拟字段，所以并不合并
			'field'=>array_merge($databaseFields['field'],$databaseMultFields['field']),
			'alias'=>array_merge($databaseFields['alias'],$databaseMultFields['alias']),
			'field_alias'=>array_merge($databaseFields['field_alias'],$databaseMultFields['field_alias']),
			'relation'=>(array)$databaseMultFields['relation'],
		];
		
		return $format;
		$b = array_merge($databaseFields,$databaseMultFields,[
			'table'=>$this->model->table_name,
			'primary'=>$this->getPrimaryKey(),
		]);
		if ($this->model->table_name == 'append_2')
		{
			dd($databaseFields);
			dd($b);
		}
		return $b;
		
		dd($databaseFields,$databaseMultFields);
		return $this->formatFields($fields, $this->model);
		
		return array_merge($formatFields,['table'=>$this->model->table_name]);
// 		$tableName = $this->model->table_name;
		
// 		//primary
// 		$primary = $this->fields->get($this->fields->search(function($item,$key){
// 			return $item->is_primary !== 2;
// 		}))->name;
		
// 		//get list option
// 		$databaseFields = $this->fields->filter(function($item){
// 			if(empty($item->option))
// 			{
// 				return false;
// 			}
// 			if (!in_array('list',$item->option,true))
// 			{
// 				return false;	
// 			}
// 			if ($item->type==='Multiselect' && $item->setting->store_type!=='field')
// 			{
// 				return false;
// 			}
// 			return true;
// 		})->map(function($item) use ($tableName){
// 			return ['as_field'=>$tableName.'.'.$item->name,'field'=>$item->name,'alias'=>$item->alias];
// // 			return $tableName.'.'.$item->name." as {$tableName}.{$item->name}";
// 		});
		
// 		//MultField
// 		$databaseMultField = $this->fields->filter(function($item){
// 			if($item->type==='Multiselect' && $item->setting->store_type==='table')
// 			{
// 				return true;
// 			}
// 			return false;
// 		})->map(function($item) use ($tableName,$primary){
				
// 			//获取SQL查询语句的列
// 			$selects = array_filter($item->setting->option,function($value){
// 				return stripos($value, 'select')!==false && stripos($value, 'from')!==false;
// 			});
			
// 			$expressions = [];$i=0;$expression = [];
// 			foreach($selects as $select)
// 			{
// 				if(preg_match('/from\s+([^\s]+)[\s+|:]/imU',$select,$match))
// 				{
// 					$field = explode(',', explode(':',$select)[count(explode(':',$select))-1]);
// 					$table = trim($match[1]);
// 					$expression['field'] = $item->name;
// 					$expression['relation_table'] = $table;
// 					$expression['relation_other_id'] = $table.'.'.$field[0];
// 					$expression['relation_show_name'] = $table.'.'.$field[1];
// 					$expression['main_fork_id'] = $primary;
// 					$expression['main_table'] = $tableName;
// 					//中间关联表信息
// 					$middle = explode(',', $item->setting->store_table);
// 					$expression['middle_table'] = $middle[0];
// 					$expression['middle_fork_id'] = $middle[0].'.'.explode(':',$middle[1])[0];
// 					$expression['middle_other_id'] = $middle[0].'.'.explode(':',$middle[2])[0];
// 					$expression['middle_fork_type'] = $middle[0].'.'.$middle[3];
// 					$expression['middle_fork_type_value'] = $tableName;
// 					$expressions[$i] = $expression;
// 					$i+=1;
// 				}
// 			}
// 			return $expressions;
// 		});
// 		$databaseAsField = $databaseFields->pluck('as_field')->all();
// 		$databaseField = $databaseFields->pluck('field')->all();
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