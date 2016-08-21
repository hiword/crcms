<?php
/**
 * 图片验证码实现接口
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 10:04
 */
namespace App\Components\VerifyCode\Interfaces;
use App\Components\VerifyCode\VerifyCodeInterface;

interface ImageVerifyCodeInterface extends VerifyCodeInterface
{

    /**
     * 获取图片验证码路径
     * @return string
     */
    public function getImageSrc() : string;

}