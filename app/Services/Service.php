<?php
namespace App\Services;
use Illuminate\Support\MessageBag;
abstract class Service
{
	
	/**
	 * 系统消息
	 * @var Illuminate\Contracts\Support\MessageBag
	 * @author simon
	 */
// 	protected $messages = null;
	
	/**
	 * 状态
	 * @var boolean
	 * @author simon
	 */
// 	protected $status = true;
	
	/**
	 * 数据
	 * @var array
	 * @author simon
	 */
// 	protected $data = [];
	
	/**
	 * 
	 * @var Response
	 * @author simon
	 */
	protected $response = null;
	
	protected $model = null;
	
	protected $request = null;
	
// 	protected static $data = [];
	
	/**
	 * 初始化设置
	 * @param array $data
	 * @author simon
	 */
	public function __construct()
	{
// 		$this->messages = new MessageBag();
// 		$this->data = $data;
		
		$this->request = app('request');
			
// 		$this->data = xss_clean($this->request->all());
		
		$this->response = app('App\Services\Response');
	}
	
// 	public function setData(array $data)
// 	{
// 		static::$data = $data;
// 	}
	
// 	protected function data()
// 	{
// 		return static::$data;
// 	}
	
	/**
	 * 设置状态
	 * @param boolean $status
	 * @return \App\Services\Service
	 * @author simon
	 */
// 	protected function setStatus($status)
// 	{
// 		$this->status = $status;
// 		return $this;
// 	}
	
	/**
	 * 获取状态
	 * @return boolean
	 * @author simon
	 */
// 	public function getStatus()
// 	{
// 		return $this->status;
// 	}
	
	/**
	 * 获取消息
	 * @return \App\Services\Illuminate\Contracts\Support\MessageBag
	 * @author simon
	 */
// 	public function getMessages()
// 	{
// 		return $this->messages;
// 	}
	
} 