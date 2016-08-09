<?php
use User\Events\AuthLogEvent;

function auth_log(array $data)
{
    event(new AuthLogEvent($data, app('request')));
}