<?php
namespace Simon\Kernel\Exceptions;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
class AppException extends \Exception
{
	
	const  APP_CODE = 1003;
	
	const  HTTP_CODE = 403;
	
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
	public function __construct($message,$response = null)
	{
		$this->response = $response;
		parent::__construct($message);
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
		return new JsonResponse(app_response($this->getMessage(),static::APP_CODE), static::HTTP_CODE);
	}
	
	/**
	 * 
	 * @return \Illuminate\Routing\Redirector|\Illuminate\Http\RedirectResponse
	 * 
	 * @author simon
	 */
	protected function getRedirectResponse()
	{
		$appResponseData = app_response($this->getMessage(),static::APP_CODE);
		return $this->getRedirect()->withInput()->with($appResponseData)->withErrors($appResponseData);
	}
}