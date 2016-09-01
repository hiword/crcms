<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/1
 * Time: 20:02
 */

namespace Simon\Acl\Models;


use Simon\Kernel\Models\Model;
use Simon\User\Models\User;

class Test extends Model
{

//    protected $timestamps = false;


    public function hasBelongsToManyRole(string $type = '')
    {
        $query = $this->belongsToMany(AclRole::class,'acl_data_roles','data_id','role_id');

        if ($type)
        {
            $query = $query->where('acl_data_roles.type',$type);
        }

        return $query;
    }

    public function hasOneUser()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}