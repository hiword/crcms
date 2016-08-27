<?php
namespace Simon\Kernel\Exceptions;
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
	
	/**
	 * Get Json Response
	 *
	 * @author simon
	 */
	protected function getJsonResponse()
	{
		return new JsonResponse(app_response($this->validator->errors()->first(),static::APP_CODE), static::HTTP_CODE);
	}
	
	/**
	 *
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 *
	 * @author simon
	 */
	protected function getRedirectResponse()
	{
		$appResponseData = app_response($this->validator->errors()->first(),static::APP_CODE);
		return $this->getRedirect()->withInput()->with($appResponseData)->withErrors($appResponseData);
	}
}