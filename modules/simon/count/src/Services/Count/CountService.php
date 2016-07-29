<?php
namespace Simon\Count\Services\Count;
use Simon\Count\Services\Count;
use Simon\Count\Services\Count\Interfaces\CountInterface;
use Simon\Count\Models\Count as CountModel;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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
// 			$item->outside = $item->outside();
		}
		
		return ['models'=>$models,'page'=>$paginate->appends($appends)->render()];
	}
	
	public function setGetCache($outsideId,$outsideType,$outsideField)
	{
		
		//设置服务器端缓存
		$cacheName = "{$outsideId}_{$outsideType}_{$outsideField}";
		
		if (Cache::has($cacheName))
		{
			$count = (int)Cache::get($cacheName)+1;
		}
		else
		{
			$count = $this->model->where('outside_id',$outsideId)->where('outside_type',$outsideType)->where('outside_field',$outsideField)->count();
		}
		
		Cache::put($cacheName,$count,config('count.get_cache_time'));
	}
	
	public function setPostCache($outsideId,$outsideType,$outsideField,Request $Request)
	{
		$cacheName = sha1("{$Request->ip()}_{$outsideId}_{$outsideType}_{$outsideField}");
		Cache::put($cacheName,1,config('count.post_cache_time'));
		Cookie::make($cacheName,1,config('count.post_cache_time'),'/');
	}
	
	public function getPostCache($outsideId,$outsideType,$outsideField,Request $Request)
	{
		$cacheName = sha1("{$Request->ip()}_{$outsideId}_{$outsideType}_{$outsideField}");
		if ($Request->cookie($cacheName)) 
		{
			return true;
		}
		if (Cache::has($cacheName)) 
		{
			return true;
		}
		return false;
	}
	
	public function count($outsideId,$outsideType,$outsideField)
	{
		if(config('count.open_cache'))
		{
			$cacheCount = count_cache_get($outsideId, $outsideType, $outsideField);
			if ($cacheCount)
			{
				return $cacheCount;
			}
		}
		
		$count = $this->model->where('outside_id',$outsideId)->where('outside_type',$outsideType)->where('outside_field',$outsideField)->count();
		//write count file
		count_cache_put($outsideId, $outsideType, $outsideField,$count);
		return $count;
	}
	
}