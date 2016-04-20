<?php
use Simon\Log\Events\Logs;
use Jenssegers\Agent\Agent;
use Simon\Log\Events\ActionLog;
use Simon\Log\Events\AuthLog;
use App\Models\Model;
	/**
	 * Request And Agent
	 * @return multitype:string number NULL
	 * @author simon
	 */
// 	function agent_log_options(array $data = [])
// 	{
		//$Agent = new \Jenssegers\Agent\Agent();
	 
		// 		$data['port'] = $Request->port();
		// 		$data['user_agent'] = '';
		
// 		$data['device'] = '';//(string)$Agent->device();
// 		$data['browser'] = '';//(string)$Agent->browser();
// 		$data['browser_version'] = '';//(string)$Agent->version($data['browser']);
// 		$data['os'] = '';//(string)$Agent->platform();
// 		$data['os_version'] = '';//(string)$Agent->version($data['os']);
// 		$data['is_robot'] = 1;//$Agent->isRobot() ? 1 : 0;
// 		$data['robot_name'] = '';//(string)$Agent->robot();
// 		return $data;
// 	}
	
// 	function request_log_options(array $data = [])
// 	{
// 		$Request = app('request');
// 		$data['url'] = $Request->fullUrl();
// 		$data['method'] = $Request->method();
// 		$data['scheme'] = $Request->getScheme();
// 		$data['client_ip'] = ip_long($Request->ip());
// 		return $data;
// 	}
	
	/**
	 * 日志
	 * @param array $log
	 * @return multitype:
	 * @author simon
	 */
// 	function log_options(array $logs = [])
// 	{
// 		//session会话标识
// 		!isset($logs['created_uid']) && $logs['created_uid'] = intval(user_session('id'));
// 		!isset($logs['created_type']) && $logs['created_type'] = intval(user_session('session_type'));
// 		return array_merge(request_log_options(),agent_log_options(),$logs);
// 	}
	
	function action_log(array $data)
	{
		event(new ActionLog($data));
	}
	
	function auth_log(Model $user,$type,$status)
	{
		event(new AuthLog($user, $type, $status));
	}


// 	function logs(array $data,$actionLog = true)
// 	{
		
// 		if ($actionLog)
// 		{
// 			$logs = ['Simon\Log\Services\ActionLog\Interfaces\ActionLogStoreInterface'=>$data];
// 		}
// 		else
// 		{
// 			$logs = $data;
// 		}
// 		//Logs
		
// 		event(new Logs($logs));
// 	}