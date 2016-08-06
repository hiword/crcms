<?php
namespace App\Exceptions;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
class AppException extends \Exception
{
	
// 	const  APP_CODE = 1003;
	
// 	const  HTTP_CODE = 403;
	
	protected $appCode = 1003;
	
	protected $httpCode = 403;
	
	/**
	 * 
	 * @var \Illuminate\Http\Response $response
	 */
	protected $response = null;
	
	/**
	 * 
	 * @param string $message
	 * @param redirect Url || \Illuminate\Http\Response $response
	 * @author simon
	 */
	public function __construct($message,$appCode = 1003,$httpCode = 403,$response = null)
	{
		$this->response = $response;
		parent::__construct($message);
		
		$this->appCode = $appCode;
		$this->httpCode = $httpCode;
	}
	
	/**
	 *
	 * @return \Illuminate\Http\Response
	 * @author simon
	 */
	public function getResponse($request)
	{
		if ($this->response && $this->response instanceof Response)
		{
			return $this->response;
		}
		elseif (($request->ajax() && ! $request->pjax()) || $request->wantsJson())
		{
			return $this->getJsonResponse();
		}
		else
		{
			return $this->getRedirectResponse();
		}
	}
	
	/**
	 * 
	 * @author simon
	 */
	protected function getRedirect()
	{
		if ($this->response && is_string($this->response))
		{
			$urlRedirect = redirect($this->response);
		}
		else
		{
			$urlRedirect = back();
		}
		return $urlRedirect;
	}
	
	/**
	 * Get Json Response
	 * 
	 * @author simon
	 */
	protected function getJsonResponse()
	{
		return new JsonResponse(app_response($this->getMessage(),$this->appCode), $this->httpCode);
	}
	
	/**
	 * 
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 * 
	 * @author simon
	 */
	protected function getRedirectResponse()
	{
		$appResponseData = app_response($this->getMessage(),$this->appCode);
		return $this->getRedirect()->withInput()->with($appResponseData)->withErrors($appResponseData);
	}
}