<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 22:10
 */

function auth_loger(int $type,\Simon\User\Models\User $user)
{
    app(\Simon\User\Services\AuthLogService::class)->log([
        'user_id'=>$user->id,
        'client_ip'=>app('request')->ip(),
        'browser'=>'Firefox',
        'name'=>$user->name,
        'type'=>$type,
    ]);
}