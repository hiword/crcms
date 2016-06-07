<?php
namespace Simon\Count\Services\Count;
use Simon\Count\Services\Count;
use Simon\Count\Services\Count\Interfaces\CountInterface;
use Simon\Count\Models\Count as CountModel;
class CountService extends Count implements CountInterface
{
	
	public function paginate(array $appends = [])
	{
		$paginate = $this->model->orderBy(CountModel::CREATED_AT,'DESC')->paginate(15);
		
		$models = $paginate->items();
		foreach ($models as $item)
		{
			$item->client_ip = long_ip($item->client_ip);
			$item->client_ip_area = ip_location($item->client_ip);
		}
		
		return ['models'=>$models,'page'=>$paginate->appends($appends)->render()];
	}
	
	public function count($outsideId,$outsideType)
	{
		//这里先不作缓存
		return $this->model->where('outside_id',$outsideId)->where('outside_type',$outsideType)->count();
	}
	
}