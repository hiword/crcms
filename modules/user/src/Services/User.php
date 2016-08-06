<?php
namespace Simon\User\Services;
use App\Services\Service;
use Simon\User\Models\User as UserModel;
abstract class User extends Service
{
	
	public function __construct(UserModel $User) 
	{
		parent::__construct();
		$this->model = $User;
	}
	
}