<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 19:50
 */

namespace Simon\User\Services\Interfaces;


use Simon\User\Models\User;

interface MailCodeInterface
{

    public function generate(User $User) : string;


    public function verify(User $User,string $hash) : bool;

}