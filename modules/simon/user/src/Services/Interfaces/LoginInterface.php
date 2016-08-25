<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/23
 * Time: 9:30
 */

namespace Simon\User\Services\Interfaces;


interface LoginInterface
{


    public function login(array $data) : LoginInterface;


    public function getUser();

}