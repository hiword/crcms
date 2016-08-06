<?php
namespace CrCms\User\Process\Interfaces;
use CrCms\ProcessInterface;

interface LoginProcessInterface extends ProcessInterface
{
	
	public function findUser(string $name) : bool;
	
	public function comparePassword(string $password) : bool;
	
	public function storeLoginInfo();
	
	public function session();
	
}