<?php

	/**
	 * 文件上传配置
	 * @param string || null $type
	 * @param array || null $config
	 * @return unknown|mixed|\Illuminate\Foundation\Application|boolean
	 * @author simon
	 */
// 	function upload_config($type = null,$config = [])
// 	{
		
// 		//type配置
// 		if (empty($type))
// 		{
// 			$type = (array)session('upload_type');
// 		}
// 		else
// 		{
// 			$type = (array)$type;
// 			session()->put('upload_type',$type);
// 		}
	
// 		if (empty($type))
// 		{
// 			throw new \Exception('未找到type索引！');
// 		}
	
// 		//config配置
// 		if (empty($config) && is_array($config))
// 		{
// 				foreach ($type as $t)
// 				{
// 					session($t,config("file.{$t}"));
// 				}
// 				return true;
// 		}
// 		elseif ($config === null)
// 		{
// 			foreach ($type as $t)
// 			{
// 				session()->forget($t);
// 			}
// 			return true;
// 		}
// 		else
// 		{
// 			foreach ($type as $t)
// 			{
// 				session()->put($t,$config[$t]);
// 			}
// 			return true;
// 		}
// 	}
	
	function upload_config($type = null)
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
	
		$config = config("file.{$type}");
		if (empty($config))
		{
			throw new \Exception('config is not exists!');
		}
		return $config;
	}















// 	function upload_config($type = null,$config = [])
// 	{
// 		//type配置
// 		if (empty($type))
// 		{
// 			$type = session('upload_type');
// 		}
// 		else
// 		{
// 			session()->put('upload_type',$type);
// 		}
	
// 		if (empty($type))
// 		{
// 			throw new \Exception('未找到type索引！');
// 		}
	
// 		//config配置
// 		if (empty($config) && is_array($config))
// 		{
// 			return session($type,config("file.{$type}"));
// 		}
// 		elseif ($config === null)
// 		{
// 			session()->forget($type);
// 			return true;
// 		}
// 		else
// 		{
// 			session()->put($type,$config);
// 			return true;
// 		}
// 	}

	/**
	 *
	 * @param string $path
	 * @param string $template
	 * @return string
	 * @author simon
	 */
	function img_url($path,$template = null)
	{
		$path = rawurlencode($path);
	
		if (empty($template))
		{
			return route('img_src',['filename'=>$path]);
		}
		else
		{
			return route('template_img_src',['template'=>$template,'filename'=>$path]);
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