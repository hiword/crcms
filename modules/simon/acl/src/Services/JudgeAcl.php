<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/2
 * Time: 16:36
 */

namespace Simon\Acl\Services;


use Illuminate\Database\Eloquent\Model;
use Simon\Acl\Services\Interfaces\Acl;
use Simon\User\Models\User;

class JudgeAcl
{

    protected $acl = null;

    protected $user = null;

    protected $permission = '';

    public function __construct(string $permission,Acl $acl,User $user)
    {
        $this->permission = $permission;
        $this->acl = $acl;
        $this->user = $user;
    }

    public function a()
    {
        //如果发布人和登录人相同
        if ($this->acl->getUser()->id === $this->user->id)
        {
            //如果发布人没有权限，则使用默认

            //判断发布人的权限（也是登录人的权限）
            if (in_array($this->permission,$selfPermission,true))
            {
                continue;
            }
            else
            {
                //delete
            }
        }
    }

}