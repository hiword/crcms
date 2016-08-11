<?php
namespace User\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use App\Exceptions\AppException;
use CrCms\User\Register;
use CrCms\User\Login;
use User\Services\AuthLog;
class AuthController extends Controller
{

	public function __construct()
	{
		parent::__construct();
		
		$this->view = 'user::'.config('site.theme').'.auth.';
	}
	
	public function getVerifyCodeSrc()
	{
		return captcha_src();
	}
	
	public function getRegister()
	{
		return $this->view('register');
	}
	
	public function postRegister(Register $Register,AuthLog $AuthLog)
	{
// 		$data = [
// 				'code'=>'1234',
// 				'name'=>'abc3210',
// 				'password'=>'setpassword',
// 		];
		
		try {
			//开启注册
			$user = $Register->bootstrap($this->data);
		} 
		catch (\CrCms\Exceptions\AppException $e)
		{
			throw new AppException($e->getMessage());
		} 
		finally { 
			
		}

		
		
		
		
	}
	
	public function getLogin(Login $Login)
	{
		$data = ['name'=>'abc3210','password'=>'123456'];
		try 
		{
			$Login->bootstrap($data);
		} 
		catch (\Exception $e) 
		{
			
		} finally {
			
		}
	}
}