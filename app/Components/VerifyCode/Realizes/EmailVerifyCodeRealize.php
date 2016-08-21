<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 11:29
 */

namespace App\Components\VerifyCode\Realizes;
use App\Components\VerifyCode\Interfaces\VerifyCodeInterface;

class EmailVerifyCodeRealize implements VerifyCodeInterface
{
    /**
     * @return string
     */
    public function getCode() : string
    {
        // TODO: Implement getCode() method.
    }

    /**
     * @param string $code
     * @return bool
     */
    public function verifyCode(string $code) : bool
    {
        // TODO: Implement verifyCode() method.
    }

}