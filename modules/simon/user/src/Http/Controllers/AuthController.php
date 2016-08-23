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
use Illuminate\Support\Facades\Mail;
use Simon\User\Http\Requests\LoginRequest;
use Simon\User\Http\Requests\RegisterRequest;
use Simon\User\Repositorys\Interfaces\SecretRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Repositorys\UserRepository;
use Simon\User\Services\Interfaces\MailCodeInterface;
use Simon\User\Services\Interfaces\RegisterInterface;


class Auth extends Controller
{

    protected $repository = null;

    public function __construct(UserRepositoryInterface $User)
    {
        $this->repository = $User;
    }

    public function postLogin(LoginRequest $LoginRequest)
    {
        //verify



    }

    protected function openRegisterVerifyCode()
    {

    }

    public function postRegister(RegisterRequest $RegisterRequest,ImageVerifyCodeRealize $ImageVerifyCodeRealize,RegisterInterface $Register,SecretRepositoryInterface $Secret,MailCodeInterface $MailCode)
    {

        //RegisterRequest 数据验证包括验证码

        //这里先不考虑Laravel接口注入
        //$ImageVerifyCodeRealize->verifyCode();

        //事物开始

        //生成密码
        $Secret = $Secret->create(['secret_key'=>str_random()]);

        //Register
        $Register->register(array_merge($data,['secret_id'=>$Secret->id]));

        //事物结束

        $user = $Register->getUser();

        //mailCode
        $MailCode->generate($user);
        //sendmail

        //mailer($user->email,RegisterMail extens Mailal);

        //session


        //日志
    }

    public function getVerifyMailCode($userid,$hash,MailCodeInterface $MailCode)
    {
        $user = $this->repository->find($userid);

        //verify
        $status = $MailCode->verify($user,$hash) ? UserRepository::MAIL_STATUS_VERIFY : UserRepository::MAIL_STATUS_VERIFY_FAIL;

        //修改状态
        $this->repository->update($userid,['status'=>$status]);

        if ($status === UserRepository::MAIL_STATUS_VERIFY)
        {
            //成功
        }
        else
        {
            //失败
        }

    }
}
