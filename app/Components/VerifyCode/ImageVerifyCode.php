<?php

/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 10:08
 */
namespace App\Components\VerifyCode;
use App\Components\VerifyCode\Interfaces;

class ImageVerifyCode extends AbstractVerifyCode
{
    /**
     * @return bool
     */
    public function isOpenVerifyCode() : bool
    {
        // TODO: Implement isOpenVerifyCode() method.
        //这里通过config写入配置
        return false;
    }

}