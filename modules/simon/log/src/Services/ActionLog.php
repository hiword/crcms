<?php
namespace Simon\Log\Services;
use App\Services\Service;
use Simon\Log\Models\ActionLog as ActionLogModel;
abstract class ActionLog extends Service 
{
	
	public function __construct(ActionLogModel $ActionLog)
	{
		parent::__construct();
		$this->model = $ActionLog;
	}
	
	
	
}