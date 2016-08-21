<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 18:21
 */
if (!function_exists('mailer'))
{
    function mailer(string $to,\Illuminate\Mail\Mailable $Mail)
    {
        $Mail = new \Simon\Mail\Services\Mail();
        $Mail->send($to,$Mail);
        $Mail->log($to,$Mail->build(),get_class($Mail));
    }
}