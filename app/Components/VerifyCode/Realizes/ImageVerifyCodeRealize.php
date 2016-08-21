<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 11:15
 */

namespace App\Components\VerifyCode\Realizes;
use App\Components\VerifyCode\Interfaces;

class ImageVerifyCodeRealize implements ImageVerifyCodeInterface
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

    /**
     * @return string
     */
    public function getImageSrc() : string
    {
        // TODO: Implement getImageSrc() method.
    }

}