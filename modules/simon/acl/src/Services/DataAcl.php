<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/2
 * Time: 15:39
 */

namespace Simon\Acl\Services;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Simon\Acl\Services\Interfaces\Acl;

class DataAcl implements Acl
{

    protected $model = null;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getUser()
    {
        return $this->model->hasOneUser ?? null;
    }

    public function getUserPermission()
    {
        return $this->model->hasOneUser->hasBelongsToManyPermission()->get();
    }

    public function getUserRole()
    {
        return $this->model->hasOneUser->hasBelongsToManyAclRole()->get();
    }

    public function getOther()
    {

        $others = $this->model->hasBelongsToManyOther($this->type)->get();

        //未设置则设置默认组
        if ($others->isEmpty())
        {
            $others = collect(config('acl.acl_other'));
        }

        return $others;
    }

    public function getOtherPermission()
    {

        $otherPermissions = collect();

        foreach ($this->getOther() as $other)
        {
            $permission = $other->hasBelongsToManyPermission()->pluck('node','id');

            if (!$permission->isEmpty())
            {
                $otherPermissions->put($other->id,$permission);
            }
        }

        return $otherPermissions;
    }

    public function getRole() : Collection
    {
        $roles = $this->model->hasBelongsToManyRole($this->type)->get();

        //未设置则设置默认组
        if ($roles->isEmpty())
        {
            $roles = collect(config('acl.acl_role'));
        }

        return $roles;
    }

    public function getRolePermission()
    {
        $rolePermissions = collect();

        foreach ($this->getRole() as $role)
        {
            $permission = $role->hasBelongsToManyPermission()->pluck('node','id');

            if (!$permission->isEmpty())
            {
                $rolePermissions->put($role->id,$permission);
            }
        }

        return $rolePermissions;
    }
}