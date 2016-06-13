<?php
namespace Simon\Model\Services\Element;
use Simon\Model\Services\Element;
use Illuminate\Support\Facades\DB;
use Simon\Model\Services\Element\Interfaces\ElementUpdateInterface;
use App\Services\Traits\UpdateTrait;

class ElementUpdateService extends Element implements ElementUpdateInterface
{
	use UpdateTrait;
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Services\Element\Interfaces\ElementUpdateInterface::update()
	 * @author simon
	 */
	public function update(array $data, $id)
	{
		// TODO Auto-generated method stub
		$this->data = $this->filterStorageValue($data);
		
		//增加内置
		$this->builtDataUpdate();
		
		//primary
		$primary = $this->fields->get($this->fields->search(function($item){
			return $item->is_primary !== 2;
		}))->name;
		
		//录入数据
		DB::table($this->model->table_name)->where($primary,$id)->update($this->data);
		
		//多选时，数据中间表写入
		if ($this->assoces)
		{
			//delete Before mult
			$this->destroyAssoceTableData($id);
			$this->storeAssoceTable($id);
		}
		
		return true;
	}

	/**
	 * 删除关联表数据
	 * @param numeric $forkId
	 * @author simon
	 */
	protected function destroyAssoceTableData($forkId)
	{	
		foreach ($this->assoces as $assoce)
		{
			DB::table($assoce['table'])->where($assoce['fork_field'],$forkId)->where($assoce['type_field'],$this->model->table_name)->delete();
		}
	}
	
}