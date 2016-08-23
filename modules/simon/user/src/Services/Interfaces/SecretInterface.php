<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/23
 * Time: 9:47
 */

namespace Simon\User\Services\Interfaces;


interface SecretInterface
{

    public function createConfusion(string $password,string $random) : string;

}