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
use App\Exceptions\ValidateException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Simon\Mail\Repositorys\MailRepository;
use Simon\RegisterMail;
use Simon\User\Http\Requests\LoginRequest;
use Simon\User\Http\Requests\RegisterRequest;
use Simon\User\Repositorys\AuthLogRepository;
use Simon\User\Repositorys\Interfaces\SecretRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Repositorys\UserMailCodeRepository;
use Simon\User\Repositorys\UserRepository;
use Simon\User\Services\Interfaces\LoginInterface;
use Simon\User\Services\Interfaces\MailCodeInterface;
use Simon\User\Services\Interfaces\RegisterInterface;
use Simon\User\Services\Interfaces\UserMailCodeInterface;


class AuthController extends Controller
{

    protected $repository = null;

    public function __construct(UserRepositoryInterface $User)
    {
        $this->repository = $User;
    }

    /**
     * @param LoginRequest $LoginRequest
     * @param LoginInterface $Login
     */
    public function postLogin(LoginRequest $LoginRequest, LoginInterface $Login)
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

        //mail
        mailer($user->email,new RegisterMail($user,$hash));

        //authlog
        auth_loger(AuthLogRepository::TYPE_REGISTER,$user);

        //session
        return 'success';

        //sendmail

        //mailer($user->email,RegisterMail extens Mailal);

        //session


        //日志
    }

    public function getVerifyMailCode(UserMailCodeInterface $MailCode,$userId,$hash)
    {
        $user = $this->repository->find($userId);

        //verify
        try {

            $status = $MailCode->verify($user->id,$hash) ? UserRepository::MAIL_STATUS_VERIFY : UserRepository::MAIL_STATUS_VERIFY_FAIL;

            $MailCode->updateStatus($hash,UserMailCodeRepository::STATUS_VERIFY_SUCCESS);

//            $this->repository
        }
        catch (ValidateException $e)
        {
            //修改mail验证状态
            $MailCode->updateStatus($hash,UserMailCodeRepository::STATUS_VERIFY_FAIL);
        }


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
