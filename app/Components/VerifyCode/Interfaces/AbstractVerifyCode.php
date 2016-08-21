<?php
/**
 * 验证码环境角色
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 11:02
 */
namespace App\Components\VerifyCode\Interfaces;

abstract class AbstractVerifyCode
{
    /**
     *
     * @var VerifyCodeInterface
     */
    protected $verifyCode = null;

    /**
     * AbstractVerifyCode constructor.
     * @param VerifyCodeInterface $VerifyCode
     */
    public function __construct(VerifyCodeInterface $VerifyCode)
    {
        $this->verifyCode = $VerifyCode;
    }

    /**
     * 是否开启验证码
     * @return mixed
     */
    abstract public function isOpenVerifyCode() : bool;

    /**
     * 获取当前验证码
     * @return string
     */
    public function getCode() : string
    {
        return $this->verifyCode->getCode();
    }

    /**
     * 验证验证码
     * @param string $code
     * @return bool
     */
    public function verifyCode(string $code) : bool
    {
        return $this->isOpenVerifyCode() ? $this->verifyCode->verifyCode($code) : true;
    }

}