<?php
return array(
	//'配置项'=>'配置值'
	'REMOET_ATTACHMENT_POSTDATA_URL'=>'http://attach.crc.cs/Index/add',//远程附件POST提交地址
	'REMOET_UPLOADS_CONFIG'=>'http://attach.crc.cs/Index/return_upload_setting',//获取附件上传配置
	
	'CHUNK_SIZE'=>'1MB',//分隔上传的每次上传大小
	
	'DISTRIBUTED_ON' =>true,//开启附件分布式存储
	'DISTRIBUTED_TYPE' =>1,//开启附件分布式存储  1指定url2根据函数通过主域名来指定多级域名
	'DISTRIBUTED_FUNC'=>'distributed_rule',//当DISTRIBUTED_TYPE为2时选择
	'DISTRIBUTED_SERVER_DOMAIN' =>array(
		'http://attachment.cs:8080',
// 			'http://attach.crc.cs',
	),//可以是一个多个也可以是一个，多个则随机指定
	'UPLOADS_SESSION_URL'=>'index.php?c=Index&a=return_session',//获取session的URL
	'UPLOADS_URL'=>'index.php?c=Index&a=upload',//获取session的URL
	'GET_OLDNAME_URL'=>'index.php?c=Index&a=set_attachment_old_name',//获取session的URL
	// 	'ATTACHMENT_SERVER_TYPE'=>2,//1随机，2指定
	// //	'ATTACHMENT_SERVER_URL'=>'http://img.newimg.cs/ims/index.php/Attachment/public_upload',
	// 	'ATTACHMENT_'=>'http://img.cs/ims/index.php/Attachment/public_upload',
	
);