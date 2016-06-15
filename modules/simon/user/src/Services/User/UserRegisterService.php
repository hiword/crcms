<?php
namespace Simon\User\Services\User;
use Simon\User\Services\User\Interfaces\UserRegisterInterface;
use Simon\User\Services\User;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\AppException;
class UserRegisterService extends User implements UserRegisterInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\User\Services\User\Interfaces\UserRegisterInterface::store()
	 * @author simon
	 */
	public function store(array $data, \Illuminate\Http\Request $Request) {
		// TODO Auto-generated method stub
		$this->model->name = $data['name'];
		$this->model->password = bcrypt($data['password']);
		$this->model->email = $data['email'];
		$this->model->register_time = time();
		$this->model->register_ip = ip_long($Request->ip());
		$this->model->mail_status = \Simon\User\Models\User::MAIL_STATUS_NOT_VERIFY;
		$this->model->save();
	
		return $this->model;
	}

	/**
	 * mail验证链接
	 * (non-PHPdoc)
	 * @see \Simon\User\Services\User\Interfaces\UserRegisterInterface::toLink()
	 * @author simon
	 */
	public function toMailLink() 
	{
		$time = time();
		$rand = str_random(20);
		$base64Rand = base64_encode($rand);
		$hash = base64_encode(bcrypt($rand.$this->model->id.$rand.$time));
		return url("auth/verify-register?id={$this->model->id}&time={$time}&rand={$base64Rand}&hash={$hash}");
	}
	
	/**
	 * 检查emial验证状态
	 * @param unknown $status
	 * @throws AppException
	 * @author simon
	 */
	public function checkMailVerifyStatus($id)
	{
		$status = $this->model->where('id',$id)->take(1)->value('mail_status');
		
		if (\Simon\User\Models\User::MAIL_STATUS_NOT_VERIFY != $status)
		{
			throw new AppException('非验证状态');
		}
	}
	
	/**
	 * 
	 * (non-PHPdoc)
	 * @see \Simon\User\Services\User\Interfaces\UserRegisterInterface::verfiyMailLink()
	 * @author simon
	 */
	public function verfiyMailLink($id,$time,$rand,$hash)
	{
		$rand = base64_decode($rand);
		$hash = base64_decode($hash);
		
		//验证hashcode
		if (!Hash::check($rand.$id.$rand.$time,$hash))
		{
			throw new AppException('hash code is error!');
		}
		
		//验证是否超时
		if (time() - intval($time) > 12*3600)
		{
			throw new AppException('timeout!');
		}
	}

	/**
	 * 修改email验证状态
	 * @param integer $userid
	 * @param integer $status
	 * @author simon
	 */
	public function updateMailVerifyStatus($id)
	{
		$this->model->where('id',$id)->update(['mail_status'=>\Simon\User\Models\User::MAIL_STATUS_VERIFY]);
	}
}