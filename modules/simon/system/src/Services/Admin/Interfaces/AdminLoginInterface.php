<?php
namespace Simon\System\Services\Admin\Interfaces;
interface AdminLoginInterface
{
	public function findUser($name);
	
	public function comparePassword($password);
}