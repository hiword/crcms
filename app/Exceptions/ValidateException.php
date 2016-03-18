<?php
namespace App\Exceptions;
class ValidateException extends AppException
{
	
	protected $appCode  = 1001;
	
	protected $httpCode = 422;
	
}