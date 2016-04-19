<?php
namespace Simon\User\Services\User\Interfaces;
interface UserLoginInterface
{
	
	public function findUser($name); 
	
	public function comparePassword($password);

}