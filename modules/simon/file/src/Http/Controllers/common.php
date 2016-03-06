<?php
/**
 * 设置分布式存储域名
 * @return Ambigous <unknown, mixed>|mixed
 */
function setDistributedDomain() {
	if (C('DISTRIBUTED_ON')) {
		$type = C('DISTRIBUTED_TYPE');
		$domain = C('DISTRIBUTED_SERVER_DOMAIN');
		//获取一个随机域名
		$domain = count($domain)==1 ? $domain[0] : array_rand($domain);
		if ($type == 1) {
		} elseif ($type == 2) {
			$domain = call_user_func(C('DISTRIBUTED_FUNC'), $domain);
		}
	} else {
		$domain = U('Attachment/Index/upload','',true,true);
	}
	return $domain;
}
/**
 * 多级分布式存储域名设置 DISTRIBUTED_TYPE=2
 * @param string $domain
 * @return mixed
 */
function distributed_rule($domain) {
	/* $sha1 = sha1($domain); */
	//设置二级域名规则
	$rand = mt_rand(0,3);
	return str_replace(array('http://','https://'), array("http://{$rand}.","https://{$rand}."), $domain);
}