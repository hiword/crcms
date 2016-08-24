<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 21:39
 */

namespace Simon\User\Services\Interfaces;


interface AuthLogInterface
{

    public function log(array $data);

}