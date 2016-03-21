<?php

class A {
	
	protected $a = 0;
	
	public function a()
	{
		
	}
	
	public static function b()
	{
		echo $this->a;
	}
}

A::b();





































function curl($url,$options = [])
{
	$ch = curl_init($url);

	$defaultptions = [
			CURLOPT_TIMEOUT => 1,
			CURLOPT_RETURNTRANSFER=>true,
			CURLOPT_USERAGENT=> 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.89 Safari/537.36',
			CURLOPT_FOLLOWLOCATION => true,//?..璺宠浆?..椤甸.
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
	
	$b = curl_getinfo($ch,CURLOPT_COOKIE);
	var_dump($b);
	curl_close($ch);
	

	//      if (!empty($result) && preg_match('/^The URL has moved.+goUrl=(.+)&.*/i', $result,$match))
	//      {
	//              echo rawurldecode($match[1]);
	//              return curl(rawurldecode($match[1]),$options);
	//      }

	return $result;
}

$url = "http://m.vip.qq.com/?aid=mvip.pingtai.shouteng.topmenu.kt&sid=ATFt6aWCnSY0LSpY2kq0N45K";

// $resouce = curl($url);
$resouce = curl($url);
echo $resouce;exit();
exit();
