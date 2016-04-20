<?php
namespace Simon\Log\Services;
use App\Services\Service;
use Simon\Log\Models\AuthLog as AuthLogModel;
abstract class AuthLog extends Service
{
	
	public function __construct(AuthLogModel $Auth)
	{
		parent::__construct();
		$this->model = $Auth;
	}
	
	
	
}