<?php
namespace Simon\File\Exceptions;
use App\Exceptions\AppException;
class FileUploadException extends AppException
{
	const  APP_CODE = 1020;
	
	const  HTTP_CODE = 403;
	
	public function getResponse($request) 
	{
		return $this->getJsonResponse();
	}
}