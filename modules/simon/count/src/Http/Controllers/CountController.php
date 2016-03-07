<?php
namespace Simon\Count\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Count\Models\Count;
use Simon\Count\Models\CountDetail;
class CountController extends Controller
{
	
	public function __construct(Count $Count)
	{
		parent::__construct();
		
		$this->model = $Count;
	}
	
	public function getCount(CountDetail $CountDetail)
	{
		$fields = ['outside_type','outside_id','client_ip'];
		
// 		$this->data['outside_type'] = 'abc3210';
// 		$this->data['outside_id'] = 10;
// 		$this->data['agent'] = 'agent';
		
		//默认添加client_ip
		$this->data['client_ip'] = $this->request->ip();
		
		$this->validate($fields);
		$this->validate(['agent'],$CountDetail);

		$this->model = $this->storeData($fields);
		$this->storeData(['cid','agent'],$CountDetail,array_merge($this->data,['cid'=>$this->model->id]));
		
// 		return 
	}
	
	
	
}