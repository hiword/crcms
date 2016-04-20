<?php
namespace Simon\Log\Services\AuthLog;
use Simon\Log\Services\AuthLog;
use Simon\Log\Services\AuthLog\Interfaces\AuthLogStoreInterface;
use Simon\Log\Models\AuthLog as AuthLogModel;
class AuthLogStoreService extends AuthLog implements AuthLogStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Log\Services\AuthLog\Interfaces\AuthLogStoreInterface::store()
	 * @author simon
	 */
	public function store($type, $status, \App\Models\Model $user, \Illuminate\Http\Request $Request)
	{
		// TODO Auto-generated method stub
		
		return $this->model->create([
			'userid'=>$user->id,
			'name'=>$user->name,
			'email'=>$user->email,
			'url'=>$Request->fullUrl(),
			'status'=>$status,
			'type'=>$type,
			'client_ip'=>ip_long($Request->ip()),
		]);
	}

	
}