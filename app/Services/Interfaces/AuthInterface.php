<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/24
 * Time: 22:22
 */

namespace App\Service\Interfaces;


use App\Models\Model;
use Simon\User\Models\User;

interface AuthInterface
{

    public function logout();

    public function id();

    public function user();

}