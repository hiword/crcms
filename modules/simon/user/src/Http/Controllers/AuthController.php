<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 9:48
 */
namespace Simon\User\Http\Controllers;
use App\Components\VerifyCode\Interfaces\ImageVerifyCodeInterface;
use App\Components\VerifyCode\Realizes\ImageVerifyCodeRealize;
use App\Http\Controllers\Controller;
use Simon\User\Http\Requests\RegisterRequest;
use Simon\User\Repositorys\Interfaces\SecretRepositoryInterface;
use Simon\User\Services\Interfaces\RegisterInterface;


class Auth extends Controller
{


    public function postRegister(RegisterRequest $RegisterRequest,ImageVerifyCodeRealize $ImageVerifyCodeRealize,RegisterInterface $Register,SecretRepositoryInterface $Secret)
    {

        //RegisterRequest 数据验证

        //这里先不考虑Laravel接口注入
        $ImageVerifyCodeRealize->verifyCode();

        //事物开始

        //生成密码
        $Secret = $Secret->create(['secret_key'=>str_random()]);

        //Register
        $Register->register(array_merge($data,['secret_id'=>$Secret->id]));

        //事物结束

        $user = $Register->getUser();

        //session


        //日志
    }

}
