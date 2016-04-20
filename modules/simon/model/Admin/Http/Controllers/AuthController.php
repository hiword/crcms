<?php
namespace Admin\Http\Controllers;
use App\Http\Controllers\Controller;
use CrCms\Services\User\User;
use CrCms\Services\Log\Observer\Login;
use Admin\Fields\Admin;
use CrCms\Services\Log\Observer\Operation;
class AuthController extends Controller {
	
	public function initialization() {
		
		$this->model = new \Admin\Models\Admin();
		$this->field = new Admin();
		parent::initialization();
	}
	
	public function getLogin()
	{
		return $this->response('auth.login');
	}
	
	public function postLogin()
	{
		
		
		return $this->response($response);
		
	}
	
	public function getLogout(User $user) {
		$user->logout();
	}
}