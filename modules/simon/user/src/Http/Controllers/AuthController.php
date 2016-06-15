<?php
namespace Simon\User\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\User\Services\User;
use Simon\User\Services\User\Interfaces\UserRegisterInterface;
use Simon\User\Forms\User\UserRegisterForm;
use App\Services\Interfaces\AuthInterface;
use App\Facades\Auth;
use Simon\User\Forms\User\UserLoginForm;
use Simon\User\Services\User\Interfaces\UserLoginInterface;
use Simon\Mail\Events\Mail;
use Simon\Log\Services\AuthLog\Interfaces\AuthLogStoreInterface;
use Simon\Log\Models\AuthLog;
use Simon\Log\Services\AuthLog\Interfaces\AuthLogInterface;
use Simon\User\Services\User\Interfaces\UserInterface;
class AuthController extends Controller
{
	
	protected $redirectUrl = 'user/index';
	
	protected $auth = null;
	
	public function __construct(AuthInterface $AuthInterface) 
	{
		parent::__construct();
		$this->view = 'user::'.config('site.theme').'.auth.';
		$this->auth = $AuthInterface;
	}
	
	//UserInterface $UserInterface,
	public function getVerifyRegister(UserInterface $UserInterface,UserRegisterInterface $UserRegisterInterface)
	{
		try 
		{
			extract($this->data);
			$UserRegisterInterface->verfiyMailLink($id, $time, $rand, $hash);
			
			//检查原验证状态
			$UserRegisterInterface->checkMailVerifyStatus($id);
			
			//修改验证状态
			$UserRegisterInterface->updateMailVerifyStatus($id);
			
			return $this->response(['app.success'],$this->redirectUrl);
		} 
		catch (\Exception $e) 
		{
			//记录日志
			
			//throw
			throw $e;
		}
	}
	
	public function getRegister()
	{
		
		
// 		\Illuminate\Support\Facades\Mail::raw('fdsafdsafdsafdsa',function($message){
// 			$message->to('28737164@qq.com','test')->subject('Hello');
// 		});
		
// 		exit();
		return $this->view('register');
	}
	
	public function postRegister(UserRegisterForm $UserRegisterForm,UserRegisterInterface $UserRegisterInterface,AuthLogInterface $AuthLogInterface) 
	{
		$this->form->validator($UserRegisterForm);
		
		if (module_exists('log'))
		{
			//判断注册时间
		}
		
		$user = $UserRegisterInterface->store($this->data,$this->request);
		
		//验证链接
		$user->to_mail_link = $UserRegisterInterface->toMailLink();
		
		//保存session
		$this->auth->store($user);
		
		if (module_exists('mail')) 
		{
			mailer('user::emails.register', $user->email,$user->toArray(),'register');
		}
		
		if (module_exists('log'))
		{
			/*这里先这样写，使用是的AuthLogModel里面的常量，不知controller应该如何调用，因为controller是不允许调用model的*/
			auth_log($user, $AuthLogInterface->register(), $AuthLogInterface->success());
		}
		
		return $this->response(['app.success'],$this->redirectUrl);
	}
	
	public function getLogin()
	{
		return $this->view('login');
	}
	
	public function postLogin(UserLoginForm $UserLoginForm,UserLoginInterface $UserLoginInterface) 
	{
		$this->form->validator($UserLoginForm);
		
		$user = $UserLoginInterface->findUser($this->data['name']);
		
		$UserLoginInterface->comparePassword($this->data['password']);
		
		$this->auth->store($user);
		
		return $this->response(['app.success'],$this->redirectUrl);
	}
}