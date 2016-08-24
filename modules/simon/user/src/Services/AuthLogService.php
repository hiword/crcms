<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 21:41
 */

namespace Simon\User\Services;


use Simon\User\Repositorys\Interfaces\AuthLogRepositoryInterface;
use Simon\User\Services\Interfaces\AuthLogInterface;
use Simon\User\Events\AuthLogEvent;

class AuthLogService implements AuthLogInterface
{

    public function log(array $data)
    {
        event(new AuthLogEvent($data));
    }

}