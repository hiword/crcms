<?php

	/**
	 * @desc  im:十进制数转换成三十六机制数
	 * @param (int)$num 十进制数
	 * return 返回：三十六进制数
	 */
	function get_10_36($num)
	{
		$num = intval($num);
		if ($num <= 0)
		{
			return false;
		}
		
		$charArr = array('0','1','2','3','4','5','6','7','8','9','A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
		$char = '';
		do
		{
			$key = ($num - 1) % 36;
			$char= $charArr[$key] . $char;
			$num = floor(($num - $key) / 36);
		} while ($num > 0);
		
		return $char;
	}
	
	/**
	 * @desc  im:三十六进制数转换成十机制数
	 * @param (string)$char 三十六进制数
	 * return 返回：十进制数
	 */
	function get36_10($char)
	{
		$array=array('0','1','2','3','4','5','6','7','8','9','A', 'B', 'C', 'D','E', 'F', 'G', 'H', 'I', 'J', 'K', 'L','M', 'N', 'O','P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y','Z');
		$len=strlen($char);
		$sum = 0;
		for($i=0;$i<$len;$i++)
		{
			$index=array_search($char[$i],$array);
			$sum+=($index+1)*pow(36,$len-$i-1);
		}
		return $sum;
	}
	
	/**
	 * IP转为数值型
	 * @param string $ip
	 * @return string
	 */
	function ip_long($ip)
	{
		return sprintf("%u",ip2long($ip));
	}
	
	/**
	 * 数值转为IP
	 * @param numeric $proper_address
	 * @return string
	 */
	function long_ip($proper_address)
	{
		return long2ip($proper_address);
	}
	
	/**
	 * 字符串转换成16进制
	 * @param string $str
	 * @return string
	 */
	function str_to_hex($str)
	{
		$m1=$url="";
		for($i=0;$i<=strlen($str);$i++){
			$m1=base_convert(ord(substr($str,$i,1)),10,16);
			$m1!="0" &&	$url=$url."\x".$m1;
		}
		return $url;
	}
	
	/**
	 * 16进制转换成UTF-8字符串
	 * @param unknown $hex
	 * @return Ambigous <mixed, string>
	 */
	function hex_to_str($hex)
	{
		$string = str_replace(array("\t","\n","\r"),'',stripcslashes($hex));
		// 		$encode = mb_detect_encoding($string, array('ASCII','UTF-8','GB2312','GBK','BIG5'));
		// 		if ($encode != 'UTF-8') {
		// 			$string = iconv($encode, 'UTF-8', $string);
		// 		}
		return trans_coding($string);
	}
	
	/**
	 * curl操作
	 * @param string $url
	 * @param array $options
	 * @return mixed
	 */
	function curl($url,array $options = [])
	{
		$ch = curl_init($url);
	
		$defaultptions = [
				CURLOPT_TIMEOUT => 1,
				CURLOPT_RETURNTRANSFER=>true,
				CURLOPT_USERAGENT=> 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36',
				CURLOPT_FOLLOWLOCATION => true,//抓取跳转后的页面
		];
	
		if (empty($options))
		{
			$options = $defaultptions;
		}
		else
		{
			$newKey = array_keys($options);
			foreach ($defaultptions as $key=>$value)
			{
				if (!in_array($key, $newKey,true))
				{
					$options[$key] = $value;
				}
			}
		}
	
		curl_setopt_array($ch,$options);
	
		$result = curl_exec($ch);
	
		curl_close($ch);
	
		return $result;
	}
	
	/**
	 * 创建目录
	 * @param string $dir
	 * @param number $mode
	 * @return boolean|bool
	 */
	function mk_dir($dir, $mode = 0755)
	{
		if (is_dir($dir) || @mkdir($dir, $mode)) return true;
		if (!@mk_dir(dirname($dir), $mode)) return false;
		return mkdir($dir, $mode);
	}
	
	/**
	 * 删除文件或目录
	 * @param string $path
	 */
	function remove_dir($path)
	{
		$path = rtrim($path,'/');
		if (is_dir($path))
		{
			$dirArr = scandir($path);
			foreach ($dirArr as $dirVal)
			{
				if ($dirVal === '.' || $dirVal === '..') continue;
				$filePath = $path.'/'.$dirVal;
				is_dir($filePath) ? remove_dir($filePath) : @unlink($filePath);
			}
		}
		else
		{
			return @unlink($path);
		}
		chmod($path, 0777);
		return @rmdir($path);
	}
	
	/**
	 * 得到一个文件或目录的大小
	 * @param string $path
	 */
	function dir_size($path)
	{
		if (is_dir($path))
		{
			$size = 0;
			$dirArr = scandir($path);
			foreach ($dirArr as $dirVal)
			{
				if ($dirVal === '.' || $dirVal === '..') continue;
				$filePath = "{$path}/{$dirVal}";
				$size += is_dir($filePath) ? dir_size($filePath) : filesize($filePath);
			}
		}
		else
		{
			$size = filesize($path);
		}
		return $size;
	}
	
	/**
	 * 将非UTF-8字符集转为UTF-8
	 * @param string $string
	 * @return string
	 */
	function trans_coding($string,$encode = 'UTF-8')
	{
		$getEncode = mb_detect_encoding($string, array("ASCII",'UTF-8',"GB2312","GBK",'BIG5'));
		if ($getEncode != $encode)
		{
			$string = iconv($getEncode,$encode,$string);
		}
		return $string;
	}

	/**
	 *
	 * 单位转换，字节转换为常用单位量
	 * @param numeric $size => Beat
	 * @return string
	 */
	function unit_conversion($size,$delimiter = '')
	{
		return byte_size($size,$delimiter);
	}
	
	/**
	 * 字节转化为大小
	 * @param numeric $byte
	 * @param string $delimiter
	 * @return string
	 */
	function byte_size($byte,$delimiter = '')
	{
		$units = array('B', 'KB', 'MB', 'GB', 'TB', 'PB');
		for ($i = 0; $byte >= 1024 && $i < 6; $i++) $byte /= 1024;
		return round($byte, 2) . $delimiter . $units[$i];
	}
	
	/**
	 *
	 * 文件大小转换为字节
	 * @param numeric $size => Beat
	 * @return numeric
	 */
	function size_byte($size)
	{
		
		if(is_numeric($size)) return $size;
		
		//获取单位
		$unit = strtoupper(substr($size,-2,2));
		//获取数值
		$size = rtrim($size,$unit);
		
		switch($unit)
		{
			case 'KB' : $realSize = $size * pow(2,10); break;
			case 'MB' : $realSize = $size * pow(2,20); break;
			case 'GB' : $realSize = $size * pow(2,30); break;
			case 'TB' : $realSize = $size * pow(2,40); break;
			case 'PB' : $realSize = $size * pow(2,50); break;
			default	  : $realSize = 0;
		}
		return $realSize;
	}
	
