<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/1
 * Time: 20:24
 */
return [
    'acl'=>[
        'other'=>[],
        'role'=>['R'],
        'user'=>['R','W']
    ],
//    'acl_role'=>[0],//id 默认为0 - 则为默认组
    'acl_role'=>['id'=>0,'name'=>'默认角色','status'=>1],//id 默认为0 - 则为默认组

    'acl_other'=>['id'=>0,'name'=>'其它用户','status'=>1],//id 默认为0 - 则为默认组


    'b'=>'123',
];