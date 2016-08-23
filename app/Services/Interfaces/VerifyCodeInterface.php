<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/23
 * Time: 9:37
 */

namespace App\Services\Interfaces;


interface VerifyCodeInterface
{

    public function isOpenVerifyCode() : bool;

}