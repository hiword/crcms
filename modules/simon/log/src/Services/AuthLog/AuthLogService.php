<?php
namespace Simon\Log\Services\AuthLog;
use Simon\Log\Services\AuthLog;
use Simon\Log\Services\AuthLog\Interfaces\AuthLogInterface;
use Simon\Log\Models\AuthLog as AuthLogModel;
class AuthLogService extends AuthLog implements AuthLogInterface
{
	
	public function login()
	{
		return AuthLogModel::TYPE_LOGIN;
	}
	
	public function register() 
	{
		return AuthLogModel::TYPE_REGISTER;
	}
	
	public function success() 
	{
		return AuthlogModel::STATUS_SUCCESS;
	}
	
	public function error() 
	{
		return AuthLogModel::STATUS_ERROR;
	}
	
}