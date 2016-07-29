<?php
namespace Simon\Count\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Count\Services\Count\Interfaces\CountInterface;
use Simon\Count\Events\Count;
use Illuminate\Support\Facades\Cache;
class CountController extends Controller 
{

	public function __construct(CountInterface $Count)
	{
		parent::__construct();
		$this->service = $Count;
	}
	
// 	public function getCount($outsideId,$outsideType,$outsideField)
// 	{
// 		$count = $this->service->count($outsideId,$outsideType,$outsideField);
// 		return $this->response(['app.success'],['count'=>$count]);
// 	}
	
	public function getCount($outsideId,$type,$outsideField,$filter = 1)
	{
		$type = config("count.{$type}");
// 		dd($type);
		//open filter count
		/* if (intval($filter) === 1)
		{
			$filterName = count_cache_name($outsideId, $outsideType, $outsideField); 
			
			//check cookie
			$cookie = $this->request->cookie($filterName);
			if ($cookie)
			{
				return $this->response(['app.success'],['cache'=>1]);
			}
			
			//check cache
			$filterName = $filterName.'_checkIp';
			$filterIps = Cache::get($filterName);
			if (!empty($filterIps[$this->request->ip()]))
			{
				//write cookie
				return $this->response(['app.success'])->cookie($filterName,1);
			}
		} */
		
		//开启POST缓存过滤
		if($type['open_post_cache'] && $this->service->getPostCache($outsideId,$type['outside_type'],$outsideField,$this->request))
		{
			return $this->response(['app.success']);
		}
		
		
// 		$outsideType = config("count.outside_type.{$outsideType}");
		//this is not add cookie in the future need add
		event(new Count($outsideId, $type['outside_type'],$outsideField));
		
		//
		if ($type['open_get_cache'])
		{
			$this->service->setGetCache($outsideId,$type['outside_type'],$outsideField);
		}
		if ($type['open_post_cache'])
		{
			$this->service->setPostCache($outsideId,$type['outside_type'],$outsideField,$this->request);
		}
		return 123;
		return $this->response(['app.success']);
	}
	
}