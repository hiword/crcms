<?php
/**
 * Created by PhpStorm.
 * User: simon
 * Date: 2016/8/21
 * Time: 9:48
 */
namespace Simon\User\Http\Controllers;
use Germey\Geetest\CaptchaGeetest;
use Illuminate\Support\Facades\Mail;
use Simon\Kernel\Exceptions\AppException;
use Simon\Kernel\Exceptions\ValidateException;
use Simon\Kernel\Http\Controllers\Controller;
use Simon\Mail\Repositorys\MailRepository;
use Simon\User\Facades\User;
use Simon\User\Http\Requests\LoginRequest;
use Simon\User\Http\Requests\RegisterRequest;
use Simon\User\Repositorys\AuthLogRepository;
use Simon\User\Repositorys\Interfaces\AuthLogRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserMailCodeRepositoryInterface;
use Simon\User\Repositorys\Interfaces\UserRepositoryInterface;
use Simon\User\Repositorys\UserMailCodeRepository;
use Simon\User\Repositorys\UserRepository;


class AuthController extends Controller
{

    use CaptchaGeetest;

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

    public function getRegister(RegisterRequest $RegisterRequest)
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


    public function getVerifyMailCode(UserMailCodeRepositoryInterface $MailCode,$userId,$hash)
    {
        try {
            if ($MailCode->verify($userId,$hash))
            {
                //修改mail验证状态
                $MailCode->updateStatus($MailCode->statusVerifySuccess());

                //修改用户验证状态
                $this->repository->updateMailStatus($userId,$this->repository->mailStatusVerify());
            }
        } catch (AppException $e)
        {
            //修改mail验证状态
            $MailCode->updateStatus($MailCode->statusVerifyFail());

            //throw
            abort($e::HTTP_CODE,$e->getMessage());
        }

        return $this->redirectRoute('login');
    }
}
