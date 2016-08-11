<?php
use User\Events\AuthLogEvent;

function auth_log(int $type,array $data)
{
	//如果在service中写，那么开启队列之后，每次的ip都会变成本机，所以此处需要加上
	$data['client_ip'] = ip_long(app('request')->ip()); 
    event(new AuthLogEvent($type,$data));
}