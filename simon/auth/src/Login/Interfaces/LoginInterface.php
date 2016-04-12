<?php
namespace Simon\Auth\Login\Interfaces;

interface LoginInterface
{
	
	public function verifyCode($code,$verify);
	
	public function checkUsername($name);
	
	public function checkPassword($inputPassword,$databasePassword); 
	
}
