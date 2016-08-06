<?php
namespace CrCms\User\Process;
use CrCms\Process;
use User\Services\Login as LoginService;
use CrCms\Exceptions\AppException;

class Login extends Process
{
	public function __construct(LoginService $login)
	{
		parent::__construct($login);
	}
	
	public function bootstrap(array $data)
	{
		
		if (!$this->service->validateForm($data))
		{
			throw new AppException($this->service->getValidateMessage());
		}
		
		if (!$this->service->findUser($data['name']))
		{
			throw new AppException($this->service->userNotExistsError()); 
		}
		
		if (!$this->service->comparePassword($data['password']))
		{
			throw new AppException($this->service->passwordError());
		}
		
		$this->service->storeLoginInfo();
		
		$this->service->session();
	}
	
// 	protected function ver
	
}