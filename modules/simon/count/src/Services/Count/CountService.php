<?php
namespace Simon\Count\Services\Count;
use Simon\Count\Services\Count;
use Simon\Count\Services\Count\Interfaces\CountInterface;
class CountService extends Count implements CountInterface
{
	
	public function count($outsideId,$outsideType)
	{
		//这里先不作缓存
		return $this->model->where('outside_id',$outsideId)->where('outside_type',$outsideType)->count();
	}
	
}