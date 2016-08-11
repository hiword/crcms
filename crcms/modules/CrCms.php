<?php
namespace CrCms;
use CrCms\Exceptions\AppException;

abstract class CrCms
{
	
	protected $service = null;
	
	public function __construct(CrCmsInterface $service)
	{
		$this->service = $service;
	}
	
	abstract public function bootstrap(array $data);
	
	/**
	 * 图片验证码
	 * @param string $code
	 * @throws AppException
	 * @author simon
	 */
	public function verifyImageCode(string $code)
	{
		if ($this->service->openImageCodeVerify())
		{
			if ($this->service->verifyImageCode($code))
			{
				return true;
			}
			throw new AppException($this->service->langImageCodeError());
		}
	}
	
	/**
	 * 手机验证码
	 * @param string $code
	 * @throws AppException
	 * @author simon
	 */
	public function verifyMobileCode(string $code)
	{
		if ($this->service->openMobileCodeVerify())
		{
			if ($this->service->verifyMobileCode($code))
			{
				return true;
			}
			throw new AppException($this->service->langMobileCodeError());
		}
	}
	
	/**
	 * 邮件验证码
	 * @param string $code
	 * @throws AppException
	 * @author simon
	 */
	public function verifyMailCode(string $code)
	{
		if ($this->service->openEmailCodeVerify())
		{
			if ($this->service->verifyEmailCode($code))
			{
				return true;
			}
			throw new AppException($this->service->langEmailCodeError());
		}
	}
	
	/**
	 * 表单验证
	 * @param array $data
	 * @throws AppException
	 * @author simon
	 */
	public function validateForm(array $data)
	{
		if ($this->service->validateForm($data))
		{
			return true;
		}
		throw new AppException($this->service->getValidateMessage());
	}
	
}