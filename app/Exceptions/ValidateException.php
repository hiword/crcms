<?php
namespace App\Exceptions;
use Illuminate\Http\JsonResponse;
class ValidateException extends AppException
{
	
	const  APP_CODE  = 1001;
	
	const  HTTP_CODE = 422;
	
	protected $validator = null;
	
	public function __construct($validator,$response = null)
	{
		$this->validator = $validator;
		$this->response = $response;
	}
	
	public function getMessage()
	{
		return $this->validator->errors()->getMessages();
	}
	
}