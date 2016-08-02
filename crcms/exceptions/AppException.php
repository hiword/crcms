<?php
namespace CrCms\Exceptions;
class AppException extends \Exception
{
	
	const  APP_CODE = 1003;
	
	const  HTTP_CODE = 403;
	
	/**
	 * 
	 * @param string $message
	 * @author simon
	 */
	public function __construct($message)
	{
		parent::__construct($message);
	}
	
}