<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 11:44
 */
namespace Simon\User\Services\Interfaces;

interface RegisterInterface
{

    /**
     * 获取用户
     * @return mixed
     */
    public function getUser();

    /**
     * 注册主体
     * @return bool
     */
    public function register(array $data) : bool;

}