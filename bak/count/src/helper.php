<?php
use Illuminate\Support\Facades\Cache;
use App\Exceptions\AppException;

function count_cache_name($id,$type,$field)
{
	//replace $type
	$type = config("count.outside_type.{$type}");
	if (empty($type))
	{
		throw new AppException('System error!');
	}
	
	static $names;
	$names = empty($names) ? [] : $names;
	
	$keyName = str_replace(['{id}','{type}','{field}'], [$id,$type,$field], config('count.cache_rule'));
	
	if (empty($names[$keyName]))
	{
		$name = md5($id.$type.$field);
		$names[$keyName] = $name;
		return $name;
	}
	else
	{
		return $names[$keyName];
	}
}

function count_cache_increment($id, $type, $field,$increment = 1)
{
	$name = count_cache_name($id, $type, $field);
	Cache::increment($name,$increment);
}

function count_cache_get($id, $type, $field)
{
	$name = count_cache_name($id, $type, $field);
	return Cache::get($name,0);
}

function count_cache_put($id,$type,$field,$count)
{
	$name = count_cache_name($id, $type, $field);
	return Cache::put($name,$count);
}

function count_cookie_get($id,$type,$field)
{
	$name = count_cache_name($id, $type, $field);
	return request()->cookie($name);
}

function count_cookie_put($id,$type,$field,$value)
{
	$name = count_cache_name($id, $type, $field);
	response()->cookie($name,$value);
}

function count_client_ip($id,$type,$field,$store = false)
{
	$ip = request()->ip();
	$name = count_cache_name($id, $type, $field).$ip;
	if ($store)
	{
		return Cache::put($name,$ip);
	}
	
	return Cache::get($name);
}
