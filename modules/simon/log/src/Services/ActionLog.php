<?php
namespace Simon\Log\Services;
use App\Services\Service;
use Simon\Log\Services\Interfaces\ActionLogInterface;
use Simon\Log\Models\ActionLog as ActionLogModel;
class ActionLog extends Service 
{
	
	public function __construct(ActionLogModel $ActionLog)
	{
		parent::__construct();
		$this->model = $ActionLog;
	}
	
	
	
}