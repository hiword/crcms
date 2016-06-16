<?php
namespace Simon\Hacker\Services;
use App\Services\Service;
use Simon\Hacker\Models\UserSubject as UserSubjectModel;
abstract class UserSubject extends Service
{
	
	public function __construct(UserSubjectModel $UserSubject) 
	{
		parent::__construct();
		$this->model = $UserSubject;
	}
	
}