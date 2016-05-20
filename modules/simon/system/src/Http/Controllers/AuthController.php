<?php
namespace Simon\System\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\System\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Simon\System\Forms\Admin\AdminLoginForm;
use Simon\System\Services\Admin\Interfaces\AdminLoginInterface;
use App\Services\Interfaces\AuthInterface;
use App\Facades\Auth;
class AuthController extends Controller
{
	
	protected $view = 'system::auth.';
	
	protected $auth = null;
	
	public function __construct(AuthInterface $AuthInterface)
	{
		parent::__construct();
		$this->auth = $AuthInterface;
	}
	
	public function getLogin() 
	{
		return $this->view("login");
	}
	
	public function postLogin(AdminLoginForm $AdminLoginForm,AdminLoginInterface $AdminLoginInterface)
	{
		$this->form->validator($AdminLoginForm);
		
		$user = $AdminLoginInterface->findUser($this->data['name']);
		
		$AdminLoginInterface->comparePassword($this->data['password']);
		
		$this->auth->store($user);
		
		return $this->response(['success'],'manage/index');
	}
	
	public function getLogout() 
	{
		Auth::logout();
		return $this->response(['success'],'manage/auth/login');
	}
	
}