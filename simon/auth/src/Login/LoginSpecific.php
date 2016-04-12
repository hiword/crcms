<?php
namespace Simon\Auth\Login;
use Simon\Auth\Login\Interfaces\LoginInterface;
use Simon\Auth\AbsAuth;
use Simon\Auth\Models\Auth;
class LoginSpecific extends AbsAuth implements LoginInterface
{
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Auth\Login\Interfaces\LoginInterface::checkPassword()
	 * @author simon
	 */
	public function checkPassword($inputPassword,$databasePassword)
	{
		// TODO Auto-generated method stub
		if($inputPassword !== $databasePassword)
		{
			throw new \Exception('password is error');
		}
	}

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Auth\Login\Interfaces\LoginInterface::checkUsername()
	 * @author simon
	 */
	public function checkUsername($name)
	{
		// TODO Auto-generated method stub
		$model = $this->model->where($this->config->get('auth.username'),$name)->first();
		if(empty($model))
		{
			throw new \Exception('user is not exists');
		}
	}

	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Auth\Login\Interfaces\LoginInterface::verifyCode()
	 * @author simon
	 */
	public function verifyCode($code, $verify)
	{
		// TODO Auto-generated method stub
		return true;
	}

	
	
	
}