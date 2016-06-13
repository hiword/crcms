<?php 
namespace Simon\Model\Fields\Factory;
use Simon\Model\Fields\Factory;
use Simon\Model\Models\Field;
use Illuminate\Support\Facades\DB;

class Select extends Factory
{
	
	protected function getPrimaryKey()
	{
		return $this->fields->get($this->fields->search(function($item,$key){
			return $item->is_primary !== 2;
		}))->name;
	}
	
	public function lists()
	{
		//get list option
		$databaseField = $this->fields->filter(function($item){
			return $item->option && in_array('list',$item->option,true) && $item->type!='Multiselect';
		})->map(function($item) {
			return $this->model->table_name.'.'.$item->name;
		});
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
	
}
