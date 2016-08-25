<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 12:10
 */

namespace Simon\User\Repositorys\Interfaces;


use App\Repositorys\RepositoryInterface;
use Simon\User\Models\User;

interface UserRepositoryInterface extends RepositoryInterface
{


    public function mobileStatusVerify() : int;


    public function mobileStatusNotVerify() : int;


    public function mobileStatusVerifyFail() : int;


    public function mobileStatus() : array;


    public function mailStatusVerify() : int;


    public function mailStatusNotVerify() : int;

    public function mailStatusVerifyFail() : int;

    public function mailStatus() : array;


    public function storeLoginInfo(User $user) : User;

}