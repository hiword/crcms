<?php
namespace Simon\Log\Services\AuthLog;
use Simon\Log\Services\AuthLog;
use Simon\Log\Services\AuthLog\Interfaces\AuthLogStoreInterface;
class AuthLogStoreService extends AuthLog implements AuthLogStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Log\Services\AuthLog\Interfaces\AuthLogStoreInterface::store()
	 * @author root
	 */
	public function store($type, $status, array $data, \Illuminate\Http\Request $Request)
	{
		// TODO Auto-generated method stub
		return $this->model->create([
				'name'=>$data['name'],
				'email'=>$data['email'],
				'url'=>$Request->fullUrl(),
				'status'=>$data['status'],
				'type'=>$data['type'],
				'login_type'=>isset($data['login_type']) ? $data['login_type'] : 0,
				'userid'=>isset($data['userid']) ? $data['userid'] : 0,
				'client_ip'=>ip_long($Request->ip()),
		]);
	}

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Log\Services\AuthLog\Interfaces\AuthLogStoreInterface::store()
	 * @author root
	 */
	

	
	
	
}