<?php
namespace Simon\User\Services\User;
use Simon\User\Services\User\Interfaces\UserRegisterInterface;
use Simon\User\Services\User;
class UserRegisterService extends User implements UserRegisterInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		$this->model->name = $data['name'];
		$this->model->password = bcrypt($data['password']);
		$this->model->save();
		
		return $this->model;
	}

	
	
	
}