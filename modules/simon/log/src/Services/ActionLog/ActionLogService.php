<?php
namespace Simon\Log\Services\ActionLog;
use Simon\Log\Services\ActionLog;
use Simon\Log\Services\ActionLog\Interfaces\ActionLogInterface;
class ActionLogService extends ActionLog implements ActionLogInterface
{
	
	public function paginate() 
	{
		$paginate = $this->model->orderBy('id','desc')->paginate(15);
		return ['models'=>$paginate->items(),'page'=>$paginate->render()];
	}
	
}