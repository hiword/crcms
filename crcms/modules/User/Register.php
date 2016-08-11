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
		$this->verifyImageCode($data[$this->service->nameForImageCode()] ?? '');
		
		//mail验证码
		$this->verifyMailCode($data[$this->service->nameForEmailCode()] ?? '');
		
		//手机验证码
		$this->verifyMobileCode($data[$this->service->nameForMobileCode()] ?? '');
	
		//验证注册数据
		$this->validateForm($data);
		
		//验证注册时间
		if (!$this->service->verifyRegisterTimeInterval())
		{
		    throw new AppException($this->service->langRegisterTimeIntervalError());
		}
	
		//数据存储
		$this->service->register($data);
		
		//发送邮件
		$this->service->sendMail();
		
		//存储日志
		$this->service->storeAuthLog();
	}
	
	
}