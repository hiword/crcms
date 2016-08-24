<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 22:22
 */

namespace Simon\User\Services\Interfaces;


use Simon\User\Models\User;

interface AuthInterface
{

    public function login(User $user);

    public function logout();

    public function id();

    public function user();

}