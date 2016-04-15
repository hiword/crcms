<?php
namespace Simon\System\Services;
use App\Services\Service;
use Simon\System\Models\Admin as AdminModel;
abstract class Admin extends Service
{
	
	public function __construct(AdminModel $Admin) 
	{
		parent::__construct();
		$this->model = $Admin;
	}
	
}
