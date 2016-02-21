<?php
namespace App\Services\Auth;
use App\Services\Service;
use App\Models\Model;
use Simon\Log\Models\LoginLog;
use Simon\Log\Events\Logs;
abstract class Login extends Service
{
	protected $model = null;
	
	protected $name = null;
	
	protected $password = null;
	
	protected $user = null;
	
	public function __construct(Model $Model,$name,$password)
	{
		$this->model = $Model;
		$this->name = $name;
		$this->password = $password;
		$this->user = $this->user();
	}
	
	abstract protected function user();

	/**
	 * //验证登录失败次数
	 * @author simon
	 */
	protected function validateLoginErrorNum($field = 'email')
	{
		$loginErrorNum = LoginLog::where('email',$this->data['email'])->whereBetween('created_at',[strtotime(Carbon::today()),time()])->where('login_status',2)->count('*');
		if ($loginErrorNum > config('user.max_login_error_num'))
		{
			return $this->throwError(['error','user.user_login_failed_num']);
		}
	}
	
	protected function validateUser()
	{
		if ($this->user)
		{
			return ;
		}
		
		//保存错误日志
		event(new Logs([
			'Simon\Log\Models\LoginLog'=>system_logs([
				'name'=>$this->name,
				'url'=>request()->url(),
				'remark'=>"登录失败，用户名不存在,[user:{$this->name},pass:{$this->password}]",
				'login_status'=>2,
			]),
		]));
			
		$this->throwError(['error','user.user_not_exists']);
	}
	
	protected function validateStatus()
	{
		if ($this->model->status != Status::STATUS_BAN)
		{
			return ;
		}
		
		event(new Logs([
				'Simon\Log\Models\LoginLog'=>system_logs([
				'email'=>$this->data['email'],
				'url'=>request()->url(),
				'remark'=>"登录失败，被禁止用户,[user:{$this->data['email']},pass:{$this->data['password']}]",
				'login_status'=>2,
			]),
		]));
		
		$this->throwError(['error','user.user_not_login']);
	}
	
	protected function validatePassword()
	{
		if (Hash::check($this->password,$this->user->password))
		{
			return ;
		}
		
		event(new Logs([
				'Simon\Log\Models\LoginLog'=>system_logs([
				'email'=>$this->data['email'],
				'url'=>request()->url(),
				'remark'=>"登录失败，密码不正确,[user:{$this->data['email']},pass:{$this->data['password']}]",
				'login_status'=>2,
			]),
		]));
		
		$this->throwError(['error','user.password_error']);
	}
	
	protected function function_name($param) 
	{
		;
		$this->model->login($this->user->id);
	}
	
	protected function saveUser();
	{
		user_session($this->user);
	}
	
	//用户查询
	//$this->model = $this->model->where('email',$this->data['email'])->first();
	if (empty($this->model))
	{
		
		
	}
	
	//验证状态
	if ($this->model->status == Status::STATUS_BAN)
	{
		
	}
	
	//比对密码
	if ()
	{
		//log event
		
		
	}
	
	//
	
	
	//生成session
	
	
	//log event
	event(new Logs([
			'Simon\Log\Models\LoginLog'=>system_logs(['userid'=>$this->model->id,'name'=>$this->model->name,'email'=>$this->model->email,'url'=>$this->request->url(),'login_status'=>1,]),
			'Simon\Log\Models\ActionLog'=>system_logs(['remark'=>'用户登录'])
	]));
	
}