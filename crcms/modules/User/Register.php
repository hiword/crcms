<?php
namespace CrCms\User;
use User\Services\Register as RegisterService;
use CrCms\Exceptions\AppException;
use CrCms\CrCms;

class Register extends CrCms
{
	
	public function __construct(RegisterService $register)
	{
		parent::__construct($register);
	}
	
	/**
	 * 注册引导
	 * @param array $data [code,username,password]  username可能为name,mobile,email
	 * @author simon
	 */
	public function bootstrap(array $data)
	{
		//图片验证码
		if ($this->service->openImageCodeVerify() && !$this->service->verifyImageCode($data[$this->service->nameForImageCode()]))
		{
	        throw new AppException($this->service->langImageCodeError());
		}
		
		//mail验证码
		if ($this->service->openEmailCodeVerify() && !$this->service->verifyEmailCode($this->service->nameForEmailCode()))
		{
		    throw new AppException($this->service->langEmailCodeError());
		}
		
		//手机验证码
		if ($this->service->openMobileCodeVerify() && !$this->service->verifyMobileCode($this->service->nameForMobileCode()))
		{
		    throw new AppException($this->service->langMobileCodeError());
		}
	
		//验证注册数据
		if (!$this->service->validateForm($data))
		{
		    throw new AppException($this->service->getValidateMessage());
		}
		
		//验证注册时间
		if (!$this->service->verifyRegisterTimeInterval())
		{
		    throw new AppException($this->service->langRegisterTimeIntervalError());
		}
	
		//数据存储
		$this->service->register($data);
		
		$this->service->sendMail();
		
		$this->service->authLog();
	}
	
	
}