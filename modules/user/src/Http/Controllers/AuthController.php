<?php
namespace User\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use App\Exceptions\AppException;
use CrCms\User\Register;
use CrCms\User\Login;
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
	
	public function postRegister(Register $Register)
	{
// 		$data = [
// 				'code'=>'1234',
// 				'name'=>'abc3210',
// 				'password'=>'setpassword',
// 		];
		//验证验证码
		
		try {
			$Register->bootstrap($this->data);
		} 
		catch (\CrCms\Exceptions\AppException $e)
		{
			throw new AppException($e->getMessage());
		} finally {
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