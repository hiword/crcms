<?php
namespace CrCms\Logic\Count;
use CrCms\Logic\Logic;
use Simon\Count\Services\Count\CountService;
use Simon\Count\Models\Count;
class Count extends Logic
{
	public function __construct()
	{
		$this->service = new CountService(new Count());
	}
	
	/**
	 * 存储
	 * @param unknown $type
	 * @param unknown $outsideId
	 * @param unknown $outsideField
	 * @author simon
	 */
	public function store(string $type,int $outsideId,string $outsideField) : bool
	{
		//获取统计config
		$config = $this->service->getCountType($type);
		
		$outsideType = $config['outside_type'];
		
		//判断缓存是否存在
		if($config['open_store_cache'] && $this->service->hasStoreCache($outsideId,$outsideType,$outsideField))
		{
			return false;
		}
		
		//添加数据
		$this->service->store($outsideId,$outsideType,$outsideField);
		
		//生成缓存
		$this->service->setStoreCache($outsideId,$outsideType,$outsideField);
		
		return true;
	}
}