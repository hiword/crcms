<?php
namespace CrCms\User\Process;
use CrCms\Process;
use User\Services\Register as RegisterService;
use CrCms\Exceptions\AppException;

class Register extends Process
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
		//验证验证码
		isset($data['code']) && $this->checkCode($data['code']);
	
		//验证注册数据
		$this->validateRegister($data);
	
		//数据存储
		return $this->service->register($data);
	}
	
	/**
	 * 验证码验证
	 * @param string $code
	 * @throws AppException
	 * @author simon
	 */
	protected function checkCode(string $code)
	{
		if (!$this->service->verifyImageCode($code))
		{
			throw new AppException($this->service->codeImageError());
		}
	}
	
	/**
	 * 验证注册数据
	 * @param array $data
	 * @throws AppException
	 * @author simon
	 */
	protected function validateRegister(array $data)
	{
		if ($this->service->validateForm($data))
		{
			throw new AppException($this->service->getValidateMessage());
		}
	}
}