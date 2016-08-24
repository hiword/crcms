<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 22:10
 */

function auth_loger(array $data)
{
    app(\Simon\User\Services\AuthLogService::class)->log($data);
}