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
	
	public function getCountType($type)
	{
		return config("count.{$type}");
	}
	
	
	public function store($outsideId,$outsideType,$outsideField)
	{
		event(new \Simon\Count\Events\Count($outsideId, $outsideType,$outsideField));
	}
	
	public function hasStoreCache($outsideId,$outsideType,$outsideField)
	{
		$cacheName = $this->storeCacheName($outsideId, $outsideType, $outsideField);
		if (request()->cookie($cacheName))
		{
			return true;
		}
		if (Cache::has($cacheName))
		{
			return true;
		}
		return false;
	}
	
	/**
	 * 设置存储后的cookie
	 * @param numeric $outsideId
	 * @param unknown $outsideType
	 * @param unknown $outsideField
	 * @author simon
	 */
	public function setStoreCache($outsideId,$outsideType,$outsideField)
	{
		$cacheName = $this->storeCacheName($outsideId, $outsideType, $outsideField);
		Cache::put($cacheName,1,config('count.post_cache_time'));
		Cookie::make($cacheName,1,config('count.post_cache_time'),'/');
	}
	
	
	protected function storeCacheName($outsideId,$outsideType,$outsideField)
	{
		$ip = request()->ip();
		return sha1("{$ip}_{$outsideId}_{$outsideType}_{$outsideField}");;
	}
	
	
	
	
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