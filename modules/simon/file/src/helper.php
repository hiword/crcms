<?php

	/**
	 * 文件上传配置
	 * @param string || null $type
	 * @param array || null $config
	 * @return unknown|mixed|\Illuminate\Foundation\Application|boolean
	 * @author simon
	 */
	function upload_config($type = null,$config = [])
	{
		//type配置
		if (empty($type))
		{
			$type = session('upload_type');
		}
		else
		{
			session()->put('upload_type',$type);
		}
	
		if (empty($type))
		{
			throw new \Exception('未找到type索引！');
		}
	
		//config配置
		if (empty($config) && is_array($config))
		{
			return session($type,config("site.{$type}"));
		}
		elseif ($config === null)
		{
			session()->forget($type);
			return true;
		}
		else
		{
			session()->put($type,$config);
			return true;
		}
	}