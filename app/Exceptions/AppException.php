<?php
namespace App\Exceptions;
use Symfony\Component\HttpKernel\Exception\HttpException;
class AppException extends HttpException
{
	
	const  APP_CODE = 1003;
	
	const  HTTP_CODE = 403;
	
	/**
	 * 
	 * @var \Illuminate\Http\Response $response
	 */
	protected $response = null;
	
	public function __construct($message,$response = null)
	{
		$this->response = $response;
		
		parent::__construct(static::HTTP_CODE,$message);
	}
	
	/**
	 * 
	 * @return \Illuminate\Http\Response
	 * @author simon
	 */
	public function getResponse()
	{
		return $this->response;
	}
	
}