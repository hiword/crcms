<?php
namespace Simon\User\Services\User;
use Simon\User\Services\User;
use Simon\User\Services\User\Interfaces\UserLoginInterface;
use Simon\User\Exceptions\UserNotExistsException;
use Illuminate\Support\Facades\Hash;
use Simon\User\Exceptions\PasswordErrorException;
class UserLoginService extends User implements UserLoginInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\User\Services\User\Interfaces\UserLoginInterface::findUser()
	 * @author simon
	 */
	public function findUser($name)
	{
		// TODO Auto-generated method stub
		$this->model = $this->model->where('name',$name)->orWhere('email',$name)->first();
		
		if (empty($this->model))
		{
			throw new UserNotExistsException('user is not exist');
		}
		
		return $this->model;
	}
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\User\Services\User\Interfaces\UserLoginInterface::comparePassword()
	 * @author simon
	 */
	public function comparePassword($password)
	{
		// TODO Auto-generated method stub
		if (!Hash::check($password,$this->model->password))
		{
			throw new PasswordErrorException('password is error');
		}
	}

	
}