<?php
namespace Simon\Model\Services\Element;
use Simon\Model\Services\Element;
use Simon\Model\Services\Element\Interfaces\ElementStoreInterface;
use App\Services\Traits\StoreTrait;
use Illuminate\Support\Facades\DB;

class ElementStoreService extends Element implements ElementStoreInterface
{
	
	use StoreTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Model\Services\Element\Interfaces\ElementStoreInterface::store()
	 * @author simon
	 */
	public function store(array $data, $mainId = 0)
	{
		// 数据过滤
		$this->data = $this->filterStorageValue($data);
		
		//附加表主键自动关联主键
		if ($mainId)
		{
			$primary = $this->fields->get($this->fields->search(function($item){
				return $item->is_primary !== 2;
			}))->name;
			$this->data[$primary] = $mainId;
		}
		
		//添加默认数据
		$this->data['model_id'] = $this->model->id;
		$this->builtDataStore();
		
		//录入数据
		$insertId = DB::table($this->model->table_name)->insertGetId($this->data);
		
		//多选时，数据中间表写入
		if ($this->assoces)
		{
			//防止非自增数据，获取不到id值，则拿出最后一条
			if (!$insertId)
			{
				$insertId = DB::table($this->model->table_name)->orderBy($primary,'desc')->take(1)->value($primary);
			}
			$this->storeAssoceTable($insertId);
		}
		
		return $insertId;
	}
}