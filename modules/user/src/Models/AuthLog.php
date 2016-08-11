<?php
namespace User\Models;
use App\Models\Model;

class AuthLog extends Model
{
    /**
     * 登录
     * @var integer
     */
    const TYPE_LOGIN = 1;
    
    /**
     * 注册
     * @var integer
     */
    const TYPE_REGSITER = 2;
    
}