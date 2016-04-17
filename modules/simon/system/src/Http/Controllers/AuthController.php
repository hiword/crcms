<?php
namespace Simon\System\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\System\Models\Admin;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
	
	protected $view = 'system::auth.';
	
	public function __construct(Admin $Admin)
	{
		parent::__construct();
		$this->model = $Admin;
	}
	
	public function getLogin() 
	{
		return $this->view("login");
	}
	
	public function postLogin()
	{
	    
		$this->validate(['name','password']);
		
		$this->model = $this->model->where('name',$this->data['name'])->first();
		
		if (empty($this->model))
		{
		    $this->throwError(['error','user.user_not_exists']);
		}
		
		//比对密码
		if (!Hash::check($this->data['password'],$this->model->password))
		{
			$this->throwError(['error','user.password_error']);
		}
		
		user_session($this->model);
		
		return $this->response(['success'],'manage/index');
	}
	
	public function getLogout() 
	{
		user_session(false);
		return $this->response(['success'],'manage/auth/login');
	}
	
}