<?php
return [
	'session_key'=>'abc3210',
    
    'open_image_verify_error_num'=>2,//验证出错两次即开启验证码
    'open_image_verify_code'=>true,//开启验证码
    
    'open_mobile_verify_code'=>false,//开启手机验证码
    
    'open_email_verify_code'=>false,//开启邮件验证码
    
    'register_time_interval'=>0,//两次注册的时间间隔，0就表示不开启此功能，
];