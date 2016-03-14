<?php
namespace Simon\Count\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Count\Models\Count;
use Simon\Count\Models\CountDetail;
use Jenssegers\Agent\Agent;
use Illuminate\Support\Facades\Cache;
class CountController extends Controller
{
	
	public function __construct(Count $Count)
	{
		parent::__construct();
		
		$this->model = $Count;
	}
	
	public function postCount(CountDetail $CountDetail,Agent $Agent)
	{
		$outsideIds = hash_safe_data((array)$this->data['outside_id'],  (array)$this->data['hash']);
		
		$fields = ['outside_type','outside_id','client_ip'];
		
		//默认添加client_ip
		$this->data['client_ip'] = $this->request->ip();
		
		foreach ($outsideIds as $outsideId)
		{
			
			$data = array_merge($this->data,['outside_id'=>$outsideId]);
			
			$this->validate($fields,$this->model,$data);
			
			$model = $this->storeData($fields,$this->model,$data);
			
			//附加数据表
			$this->storeData(['cid','agent'],$CountDetail,['cid'=>$model->id,'agent'=>$Agent->getUserAgent()]);
			
			//增加缓存
			Cache::increment(sha1($outsideId.$data['outside_type']));
		}
		
		return $this->response(['success']);
	}
	
	public  function postView()
	{
		$counts = [];
		foreach ((array)$this->data['outside_id'] as $id)
		{
			$key = sha1($id.$this->data['outside_type']);
			if (Cache::has($key))
			{
				$counts[$id] = Cache::get($key);
			}
			else
			{
				$counts[$id] = $this->model->where('outside_id',$id)->where('outside_type','Simon\\'.$this->data['outside_type'])->count();
				Cache::put($key,$counts[$id],24*60);
			}
		}
		return $this->response(['success'],['counts'=>$counts]);
	}
	
}