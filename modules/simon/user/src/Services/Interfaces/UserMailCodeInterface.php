<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 19:50
 */

namespace Simon\User\Services\Interfaces;


use Simon\User\Models\User;

interface UserMailCodeInterface
{

    public function generate(int $userId) : string;

    public function verify(int $userId,string $hash) : bool;

    public function updateStatus(string $hash,int $type);
}