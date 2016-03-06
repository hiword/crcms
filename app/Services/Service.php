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
	protected $data = [];
	
	/**
	 * 
	 * @var Response
	 * @author simon
	 */
	protected $response = null;
	
	/**
	 * 初始化设置
	 * @param array $data
	 * @author simon
	 */
	public function __construct(array $data = [])
	{
// 		$this->messages = new MessageBag();
		$this->data = $data;
		
		$this->response = new Response();
	}
	
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