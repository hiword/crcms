<?php
namespace Simon\Log\Services;
use App\Services\AbsCud;
use Simon\Log\Models\ActionLog;
abstract class ActionLogCudService extends AbsCud 
{
	
	public function __construct(ActionLog $ActionLog) 
	{
		parent::__construct();
		$this->model = $ActionLog;
	}
	
}