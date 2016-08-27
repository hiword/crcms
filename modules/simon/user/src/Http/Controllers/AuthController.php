<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 9:48
 */
namespace Simon\User\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Simon\Kernel\Http\Controllers\Controller;
use Simon\Mail\Repositorys\MailRepository;
use Simon\RegisterMail;
use Simon\User\Facades\User;
use Simon\User\Http\Requests\LoginRequest;
use Simon\User\Http\Requests\RegisterRequest;
use Simon\User\Repositorys\AuthLogRepository;
use Simon\User\Repositorys\Interfaces\AuthLogRepositoryInterface;
use Simon\User\Repositorys\Interfaces\SecretRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserMailCodeRepositoryInterface;
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

    protected $view = 'user::default.auth.';

    public function __construct(UserRepositoryInterface $User)
    {
        parent::__construct();
        $this->repository = $User;
    }

    public function getLogin(LoginRequest $LoginRequest)
    {
        return $this->view('login');
    }

    public function getLogout()
    {
        User::logout();
        return $this->redirectRoute('login');
    }

    /**
     * @param LoginRequest $LoginRequest
     * @param LoginInterface $Login
     */
    public function postLogin(LoginRequest $LoginRequest)
    {
        //verify
        $user = $this->repository->login($this->input,ip_long($this->request->ip()));

        User::login($user);

        return $this->redirectRoute('user');
    }

    public function getRegister()
    {
        return $this->view('register');
    }

    public function postRegister(RegisterRequest $RegisterRequest,UserMailCodeRepositoryInterface $UserMailCode,AuthLogRepositoryInterface $AuthLog)
    {

        //Register
//        $user = $Register->register($this->input)->getUser();
        $user = $this->repository->register($this->input,ip_long($this->request->ip()));


        //mailCode
        $hash = $UserMailCode->generate($user->id);

        //mail
        mailer($user->email,new \Simon\User\Mails\RegisterMail($user,$hash));

        //auth logger
        auth_logger($AuthLog->typeRegister(),$user);

        //session login
        User::login($user);

        return $this->redirectRoute('user');
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
