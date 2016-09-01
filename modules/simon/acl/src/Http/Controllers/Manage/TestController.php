<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/9/1
 * Time: 20:26
 */

namespace Simon\Acl\Http\Controllers\Manage;


use Illuminate\Support\Facades\DB;
use Simon\Acl\Models\Test;
use Simon\Kernel\Http\Controllers\Controller;

class TestController extends Controller
{

    public function index()
    {
        $config = config('acl.acl');

        $models = Test::get();//where('user_id',1)->

        foreach ($models as $model)
        {
            //判断内容是否有用户
            if ($model->hasOneUser)
            {
                //查找用户权限
                $permission = $model->hasOneUser->hasBelongsToManyPermission()
                                    ->select('node')->get()
                                    ->search(function($item){
                                        return $item->node === 'R';
                                    });
                if ($permission !== false) //有值
                {
                    continue;
                }
            }

            //else 则读取默认用户权限[在没有userid字段或未查找到用户对应的权限时]
            if (in_array('R',$config['user'],true))
            {
                continue;
            }

            //======================做到些处

            //没有用户或未找到对应权限，则判断其内容用户组

            //没有user,获取组
            $roles = $model->hasBelongsToManyRole('abc')->get();
            //没有组，读取配置文件，获取默认组权限
            if ($roles->isEmpty())
            {
                if (in_array('R',$config['role'],true))
                {
                    continue;
                }
            }

        }
    }

}
