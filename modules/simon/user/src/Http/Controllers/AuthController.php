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
use Simon\User\Services\Interfaces\RegisterInterface;


class Auth extends Controller
{


    public function postRegister(RegisterRequest $RegisterRequest,ImageVerifyCodeRealize $ImageVerifyCodeRealize,RegisterInterface $Register)
    {
        //RegisterRequest 数据验证

        //这里先不考虑Laravel接口注入
        $ImageVerifyCodeRealize->verifyCode();

        //Register
        $Register->register($data);

        $user = $Register->getUser();

        //session


        //日志
    }

}
