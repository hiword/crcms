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


    public function hasBelongsToManyRole()
    {
        return $this->belongsToMany(AclRole::class,'acl_data_roles','data_id','role_id')
                    ->where('acl_data_roles.type',self::class);
    }

    public function hasBelongsToManyOther()
    {
        return $this->belongsToMany(AclOther::class,'acl_data_others','data_id','other_id')
                        ->where('acl_data_others.type',self::class);
    }

    public function hasOneUser()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

}