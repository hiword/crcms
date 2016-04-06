<?php
namespace Simon\Log\Services\ActionLog;
use App\Services\Interfaces\StoreInterface;
use Simon\Log\Services\ActionLog;
use App\Services\Traits\StoreTrait;
use Simon\Log\Services\Interfaces\ActionLogStoreInterface;
class ActionLogStoreService extends ActionLog implements ActionLogStoreInterface
{
	
	use StoreTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	
	
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Log\Services\Interfaces\ActionLogStoreInterface::store()
	 * @author simon
	 */
	public function store(array $data, \Illuminate\Http\Request $Request, \Jenssegers\Agent\Agent $Agent = null) 
	{
		// TODO Auto-generated method stub
		
		$this->model->remark = $data['remark'];
		$this->model->url = $Request->fullUrl();
		$this->model->method = $Request->method();
		$this->model->scheme = $Request->getScheme();
		$this->model->client_ip = ip_long($Request->ip());
// 		$this->model->port = $Request->port();
	
		if ($Agent)
		{
			$this->model->device = '';//(string)$Agent->device();
			$this->model->browser = '';//(string)$Agent->browser();
			$this->model->browser_version = '';//(string)$Agent->version($data['browser']);
			$this->model->os = '';//(string)$Agent->platform();
			$this->model->os_version = '';//(string)$Agent->version($data['os']);
			$this->model->is_robot = 1;//$Agent->isRobot() ? 1 : 0;
			$this->model->robot_name = '';//(string)$Agent->robot();
		}
	
		$this->builtStore();
		
		return $this->model->save();
	}

	public function requestOptions()
	{
		$Request = app('request');
		
	}
	
	function agentLogOptions()
	{
		//$Agent = new \Jenssegers\Agent\Agent();

		// 		$data['port'] = $Request->port();
		// 		$data['user_agent'] = '';
	
		$this->model->device = '';//(string)$Agent->device();
		$this->model->browser = '';//(string)$Agent->browser();
		$this->model->browser_version = '';//(string)$Agent->version($data['browser']);
		$this->model->os = '';//(string)$Agent->platform();
		$this->model->os_version = '';//(string)$Agent->version($data['os']);
		$this->model->is_robot = 1;//$Agent->isRobot() ? 1 : 0;
		$this->model->robot_name = '';//(string)$Agent->robot();
	}
	
}