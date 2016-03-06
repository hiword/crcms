<?php

namespace App\Events;

abstract class Event
{
    //
    
	/**
	 * 需要处理的数据
	 * @var array
	 * @author simon
	 */
	public $data = [];
	
	/**
	 * 系统初始化方法
	 * @param array $data 需要传入的数据
	 * @param array $logs 需要执行的Log数据
	 * @author simon
	 */
	public function __construct(array $data = [])
	{
		$this->data = $data;
	}
}
