<?php
namespace Simon\System\Services\Admin;
use Simon\System\Services\Admin\Interfaces\AdminLoginInterface;
use App\Exceptions\AppException;
use Illuminate\Support\Facades\Hash;
class AdminLoginService extends AdminService implements AdminLoginInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\System\Services\Admin\Interfaces\AdminLoginInterface::comparePassword()
	 * @author simon
	 */
	public function comparePassword($password)
	{
		// TODO Auto-generated method stub
		if (!Hash::check($password,$this->model->password))
		{
			throw new AppException('password is error');
		}
	}

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\System\Services\Admin\Interfaces\AdminLoginInterface::findUser()
	 * @author simon
	 */
	public function findUser($name)
	{
		// TODO Auto-generated method stub
		$this->model = $this->model->where('name',$name)->first();
		
		if (empty($this->model))
		{
			throw new AppException('user is not exist');
		}
		
		return $this->model;
	}

	
}