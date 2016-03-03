<?php
namespace App\Services;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Support\MessageBag;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
class Response  {
	
	/**
	 * 设置响应数据
	 * @param array $data
	 * 0 应用响应标识
	 * 1 HTTP响应标识
	 * 2 其它提示Msg标识
	 * @return Ambigous <NULL, unknown>
	 */
	protected function setResponseStatus(array $status)
	{
		
		//获取状态指定数，设置返回状态
		$statusNum = count($status);
		
		//设置默认值
		if ($statusNum === 1) 
		{
			$status[1] = $status[0];
			$status[2] = null;
		} 
		elseif ($statusNum === 2) 
		{
			$status[2] = $status[1];
			$status[1] = $status[0];
		} 
		else 
		{}
		
		return $status;
	}
	
	/**
	 * 设置需要返回的响应体
	 * 只需返回状态码和说明时，传入正常值
	 * 如：success,msg,success
	 * 当有值需要传出时，请在第一个参数传数组如：
	 * [success,msg,success],data
	 * @param string|array $appStatusCode
	 * @param string $statusMsg
	 * @param string $httpStatusCode
	 * @return array
	 */
	public function setResponseData(array $status,array $data = [])
	{
	
		$status = $this->setResponseStatus($status);
				
		//
		$messages = [];
		$messages[0] = trans('acode.'.$status[0]);
		$messages[1] = trans('hcode.'.$status[1]);
		//set default message
		if ($status[2] && $status[2] instanceof MessageBag)
		{
			$messages[2] = trans($status[2]->first());
		} 
		elseif ($status[2])
		{
			$messages[2] = trans($status[2]);
		}
		else 
		{
			$messages[2] = $status[0]==='success' ? trans('app.success') : trans('app.error');
		}
		
		//
		$response = ['status'=>$messages[0]];
		isset($messages[2]) && $response['msg'] = $messages[2];
		$data && $response['data'] = $data;
		
		return ['status'=>$messages[1],'response'=>$response];
	}
	
	/**
	 * 数据响应
	 * @param $status
	 * @param string|boolean $mixed 混合参数 redircet url
	 * @param array $data
	 * @param Request $request
	 * @param string $viewPrefix
	 * @return \Illuminate\Http\JsonResponse|Ambigous <\Illuminate\View\View, mixed, \Illuminate\Foundation\Application, \Illuminate\Container\static>|Ambigous <\Illuminate\Http\$this, boolean, \Illuminate\Http\RedirectResponse>
	 */
	public function responsed($status,$mixed = null,array $data = [],$request = null,$viewPrefix = '')
	{
		
		//快捷$data参数设置
		if (is_array($mixed) && empty($data))
		{
			$data = $mixed;
			$mixed = null;
		}
		
		//默认request设置
		empty($request) && $request = app('request');
		
		//JSON格式输出
		if (intval($request->input('_json')) === 1 || (boolean) $request->input('_json') === true) 
		{
			!is_array($status) && $status = ['success'];
			$response = $this->setResponseData($status,$data);
			return new JsonResponse($response['response'],$response['status']);
		}
		//ajax加载
		elseif ($request->ajax() || $request->wantsJson())
		{
			if (is_array($status))
			{
				$response = $this->setResponseData($status,$data);
				return new JsonResponse($response['response'],$response['status']);
			}
			//返回html
			//elseif (!is_array($status) && (strpos($status, '.') || strpos($status, '::')))
			elseif (!is_array($status))
			{
				return new HttpResponse($this->view($status,$data,$viewPrefix));
			}
		}
		//正常视图渲染加载
		//else if (!is_array($status) && (strpos($status, '.') || strpos($status, '::')))
		elseif (!is_array($status) && $mixed === null)//非跳转链接
		{
			return new HttpResponse($this->view($status,$data,$viewPrefix));
		}
		//数据提交返回
		else
		{
			$response = $this->setResponseData($status,$data);
			$errors = $response['response']['status'] == 1000 ? [] : $response['response'];
			$redirect = empty($mixed) ? redirect()->back() : redirect($mixed);
			return $redirect->with('msg',$response['response']['msg'])->withInput(array_merge((array)$request->all(),$data))->withErrors($errors);
		}
	}
	
	/**
	 * 视图返回
	 * @param string $path
	 * @param array $data
	 * @param string $viewPrefix
	 * @author simon
	 */
	protected function view($path,$data = [],$viewPrefix = '')
	{
// 		$theme = config('site.theme') ? trim(config('site.theme'),'.').'.' : '';
		$request = app('request');
		
		//这里这样强制写可能不太好，先这样
		$theme = $request->is('manage*') ? '' : config('site.theme');
		
		$view = explode('::', $viewPrefix);
		$view = "{$view[0]}::{$theme}.{$view[1]}{$path}";
		
		return view($view,array_merge((array)$request->all(),$data));
	}
	
	/**
	 * 抛出异常
	 * @param array $status
	 * @param string $url
	 */
	public function throwResponsed(array $status,$url = null) 
	{
	   $response = $this->setResponseData($status);
	   
	   $request = app('request');
	   
	   if($request->ajax() || $request->wantsJson())
	   {
			$throwResponse = new JsonResponse($response['response'],$response['status']);
	   }
	   else
	   {
	   		$errors = $response['response']['status'] == 1000 ? [] : $response['response'];
	   		$redirect = empty($url) ? redirect()->back() : redirect($url);
	   		$throwResponse =  $redirect->with('msg',$response['response']['msg'])->withInput($request->input())->withErrors($errors);
	   		//dd($throwResponse);
	   		//abort($response['status'],$response['response']['msg']);
	   }
// 	   dd(new HttpResponseException($throwResponse));
	   throw new HttpResponseException($throwResponse);
	}
}