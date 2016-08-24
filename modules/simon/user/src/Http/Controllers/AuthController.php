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
use Simon\RegisterMail;
use Simon\User\Http\Requests\LoginRequest;
use Simon\User\Http\Requests\RegisterRequest;
use Simon\User\Repositorys\Interfaces\SecretRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Repositorys\UserRepository;
use Simon\User\Services\Interfaces\LoginInterface;
use Simon\User\Services\Interfaces\MailCodeInterface;
use Simon\User\Services\Interfaces\RegisterInterface;


class AuthController extends Controller
{

    protected $repository = null;

    public function __construct(UserRepositoryInterface $User)
    {
        $this->repository = $User;
    }

    public function postLogin(LoginRequest $LoginRequest,LoginInterface $Login)
    {
        //verify


        $Login->login();

        $Login->getUser();

        //session
        //Auth::session


    }

    public function postRegister(RegisterRequest $RegisterRequest,RegisterInterface $Register,SecretRepositoryInterface $Secret,MailCodeInterface $MailCode)
    {

        //Register
        $user = $Register->register($this->input)->getUser();

        //mailCode
        $hash = $MailCode->generate($user->id);

        mailer($user->email,new RegisterMail($user,$hash));

        return 'success';

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
