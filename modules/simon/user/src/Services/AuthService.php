<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/23
 * Time: 10:21
 */

namespace Simon\User\Services;


abstract class AuthService
{

    public function createConfusion(string $password, string $random) : string
    {
        // TODO: Implement createConfusion() method.
        $random.$random.$password;
    }
}