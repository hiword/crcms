<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\HttpException;
class AppException extends HttpException
{
	
	protected $appCode = 1003;
	
	protected $httpCode = 403;
	
	protected $response = null;
	
	public function __construct($message,$response = null)
	{
		$this->response = $response;
		
		parent::__construct($this->httpCode,$message);
	}
	
	public function getAppCode()
	{
		return $this->appCode;
	}
	
	public function getHttpCode()
	{
		return $this->httpCode;
	}
	
	public function getResponse()
	{
		return $this->response;
	}
}