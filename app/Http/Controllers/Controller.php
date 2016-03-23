<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\Eloquent\Model;
use Simon\Log\Events\Logs;
use App\Services\Service;
use App\Fields\Field;

abstract class Controller extends BaseController
{
	use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	/**
	 * Hash Key
	 * @var string
	 */
	protected $hashKey = '_hash';

	/**
	 * request 对象
	 * @var Illuminate\Http\Request
	 */
	protected $request = null;

	/**
	 * 数据模型对象
	 * @var Model
	 */
	protected $model = null;

	/**
	 * 提交的数据
	 * @var array
	 */
	protected $data = [];

	/**
	 * 视图
	 * @var string
	 * @author simon
	 */
	protected $view = null;

	/**
	 * Session会话
	 * @var Session
	 * @author simon
	 */
	protected $session = null;

	/**
	 * 服务对象
	 * @var object
	 * @author simon
	 */
	protected $service = null;

	/**
	 * 需要显示的字段
	 * @var unknown
	 * @author simon
	 */
	protected $displayFields = [];
	
	/**
	 * 
	 * @var array $fields
	 * @author simon
	 */
	protected $fields = [];


	
	
	
	public function view($view = null, $data = [], $mergeData = [])
	{
		return view($this->view.$view);
	}
	
	
	
	
	
	
	
	
	
	/**
	 * 系统初始化方法
	 * @param Request $request
	 */
	public function __construct()
	{
		$this->initialization();
	}

	/**
	 * 初始化方法
	 */
	protected function initialization()
	{
		 
		//开启SQL记录，--临时
		DB::connection()->enableQueryLog();
		 
		//requestObject
		$this->request = app('request');
		 
		$this->data = xss_clean($this->request->all());
		 
		$this->session = user_session();
	}

	protected function userInitialization(){}

	protected function manageInitialization(){}
	
	/**
	 * 
	 * @param array $options
	 * @param string $actionLog
	 * @author simon
	 */
	protected function logs(array $options,$actionLog = true)
	{
		if (module_exists('log'))
		{
			logs($options,$actionLog);
		}
		
		return $this;
	}
	
	/**
	 * 直接返回响应快捷方式
	 * 参数传递只是为了设置响应体，即$this->setResponseData
	 * @param array|string $status api|ajax类型，则返回json否则返回view
	 * @param array $data
	 * @throws JsonResponse
	 */
	protected function response($status,$url = null,array $data = [])
	{
		return app('App\Services\Response')->responsed($status,$url,$data,$this->request,$this->view);
	}

	/**
	 * 抛出异常
	 * @param array $response
	 */
	protected function throwError(array $response)
	{
		return app('App\Services\Response')->throwResponsed($response);
	}

	/**
	 * 默认值设定
	 * @param string $model
	 * @param array $data
	 * @return multitype:multitype: \App\Http\Controllers\Model
	 * @author simon
	 */
	protected function dataAndModelDefaultValue(Model $model = null,array $data = [])
	{
		empty($model) && $model = $this->model;
		empty($data) && $data = $this->data;
		return ['data'=>$data,'model'=>$model];
	}

	/**
	 * 设置 Token Hash赋值
	 * @param string $key
	 * @return \App\Http\Controllers\Controller
	 */
	protected function hash($key = null)
	{
		//set key default id
		if (empty($key) && isset($this->model->id))
		{
			$key = (string)$this->model->id;
		}
		 
		//create hash
		$hash = $this->model->{$this->hashKey} = create_hash($key);
		
		view()->share('_hash',$hash);
		
		return $this;
	}

	/**
	 * 验证token快捷方式
	 * @param string $string
	 * @param string $hash
	 * @throws HttpResponseException
	 * @return \App\Http\Controllers\Controller
	 */
	protected function validateHash($string = null,$hash = null)
	{
		//设置默认值
		empty($string) && $string = $this->data['id'];
		empty($hash) && $hash = $this->data[$this->hashKey];

		//
		if (!check_hash($string, $hash))
		{
			$this->throwError(['illegal_error','app.token_error']);
		}

		return $this;
	}

	/**
	 * 数据验证
	 * @param array $fields
	 * @param Model $model
	 * @param array $data
	 * @return \App\Http\Controllers\Controller
	 * @author simon
	 */
	protected function validate(array $fields,Model $model = null,array $data = [])
	{
		extract($this->dataAndModelDefaultValue($model,$data));

		$Validator = Validator::make($data,$model->fields($fields,[],Field::VALIDATE_RULE));
		if($Validator->fails())
		{//dd($Validator->messages());
			$this->throwError(['validator_error',$Validator->messages()]);
		}
		return $this;
	}

	/**
	 * 数据添加
	 * @param array $fields
	 * @param Model $model
	 * @param array $data
	 * @return Model
	 * @author simon
	 */
	protected function storeData(array $fields,Model $model = null,array $data = [])
	{
		extract($this->dataAndModelDefaultValue($model,$data));

		$model = $model->storeData($model->fields($fields,$data,Field::STORE_HANDLE));
		if (empty($model))
		{
			$this->throwError(['error']);
		}
		return $model;
	}

	/**
	 * 数据修改
	 * @param string|int $id
	 * @param array $fields
	 * @param Model $model
	 * @param array $data
	 * @author simon
	 */
	protected function updateData($id,array $fields,Model $model = null,array $data = [])
	{
		extract($this->dataAndModelDefaultValue($model,$data));
		 
		$result = $model->updateData($id,$model->fields($fields,$data,Field::UPDATE_HANDLE));
		 
		if ($result === false)
		{
			$this->throwError(['error']);
		}
		return $model;
	}

	/**
	 * 数据删除
	 * @param array $data
	 * @param Model $model
	 * @author simon
	 */
	protected function destroyData(array $data,Model $model = null)
	{
		extract($this->dataAndModelDefaultValue($model,$data));
		 
		$result = $model->destroyData($data);
		 
		if ($result === false)
		{
			$this->throwError(['error']);
		}
		return $result;
	}

}
