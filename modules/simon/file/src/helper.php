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
			return session($type,config("file.{$type}"));
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
	
	
	function img_src($filename)
	{
		return route('img_src',['filename'=>base64_encode($filename)]);
	}
	
	function template_img_src($template,$filename)
	{
		return route('template_img_src',['template'=>$template,'filename'=>base64_encode($filename)]);
	}