<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/23
 * Time: 10:16
 */

namespace Simon\User\Services\Interfaces;


interface PasswordInterface
{

    public function generate(string $password,string $random = '') : string;

    public function check(string $password,string $hashedPassword,string $random = '') : bool;

}