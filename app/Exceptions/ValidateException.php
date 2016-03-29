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
	
	protected function getRedirectResponse()
	{
		return $this->getRedirect()->withErrors(['app_code'=>static::APP_CODE,'app_message'=>$this->validator->errors()->first()]);
	}
	
	protected function getJsonResponse()
	{
		return new JsonResponse(['app_code'=>static::APP_CODE,'app_message'=>$this->validator->errors()->first()], static::HTTP_CODE);
	}
}