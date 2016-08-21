<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 10:14
 */


//client调用模拟
namespace App\Components\VerifyCode;


use App\Components\VerifyCode\Realizes\ImageVerifyCodeRealize;

(new ImageVerifyCode(new ImageVerifyCodeRealize()))->verifyCode('code');