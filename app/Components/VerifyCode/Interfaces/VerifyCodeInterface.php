<?php
/**
 * 验证码实现接口
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 9:55
 */
namespace App\Components\VerifyCode\Interfaces;
interface VerifyCodeInterface
{

    /**
     * 获取当前验证码
     * @return mixed
     */
    public function getCode() : string;

    /**
     * 验证验证码
     * @param string $code
     * @return bool
     */
    public function verifyCode(string $code) : bool;

}