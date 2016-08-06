<?php
namespace CrCms\Exceptions;
class AppException extends \Exception
{
	protected $appCode = 1003;
	
	protected $httpCode = 403;
	
	public function __construct($message,$appCode = 1003,$httpCode = 403)
	{
		parent::__construct($message);
		
		$this->appCode = $appCode;
		$this->httpCode = $httpCode;
	}
	
	public function getAppCode($code)
	{
		return $this->appCode;
	}
	
	public function getHttpCode()
	{
		return $this->httpCode;
	}
}