<?php
namespace Simon\Count\Services\Count;
use Simon\Count\Services\Count;
use Simon\Count\Services\Count\Interfaces\CountStoreInterface;
use App\Services\Traits\StoreTrait;
use Illuminate\Http\Request;
use Simon\Count\Models\CountDetail;
use Jenssegers\Agent\Agent;
class CountStoreService extends Count implements CountStoreInterface
{
	
	use StoreTrait;
	
	protected $append = null;
	
	public function __construct(\Simon\Count\Models\Count $Count,CountDetail $CountDetail)
	{
		parent::__construct($Count);
		$this->append = $CountDetail;
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Count\Services\Count\Interfaces\CountStoreInterface::store()
	 * @author root
	 */
	//public function store(array $data, \Illuminate\Http\Request $Request, \Jenssegers\Agent\Agent $Agent)
// 	{
// 		// TODO Auto-generated method stub
// 		$this->model->outside_type = $data['outside_type'];
// 		$this->model->outside_id = $data['outside_id'];
// 		$this->model->client_ip = ip_long($Request->ip());
// 		$this->builtModelStore();
// 		$this->model->save();
		
// 		//append
// 		$this->append->create([
// 				'cid'=>$this->model->id,
// 				'agent'=>$Agent->getUserAgent(),
// 		]);
		
// 		return $this->model;
// 	}

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Count\Services\Count\Interfaces\CountStoreInterface::store()
	 * @author simon
	 */
	public function store(array $data, \Jenssegers\Agent\Agent $Agent, \Illuminate\Http\Request $Request = null) {
		// TODO Auto-generated method stub
		$this->model->outside_type = $data['outside_type'];
		$this->model->outside_id = $data['outside_id'];
		if ($Request)
		{
			$this->model->client_ip = ip_long($Request->ip());
		}
		elseif (isset($data['client_ip']))
		{
			$this->model->client_ip = ip_long($data['client_ip']);
		}
		else
		{
			$this->model->client_ip = 0;
		}
		
		$this->builtModelStore();
		$this->model->save();

		//append
		$this->append->create([
				'cid'=>$this->model->id,
				'agent'=>$Agent->getUserAgent(),
		]);

		return $this->model;
	}
	
}