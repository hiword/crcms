<?php
namespace Simon\User\Services\User;
use Simon\User\Services\User;
use Simon\User\Services\User\Interfaces\UserInterface;
class UserService extends User implements UserInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\User\Services\User\Interfaces\UserInterface::find()
	 * @author simon
	 */
	public function find($id)
	{
		// TODO Auto-generated method stub
		return $this->model->findOrFail($id);
	}



	
}