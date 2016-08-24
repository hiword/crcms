<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 21:17
 */

namespace App\Services\Interfaces;


interface MailViewInterface
{

    public function getView() : string;

}