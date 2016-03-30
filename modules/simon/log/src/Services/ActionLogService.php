<?php
namespace Simon\Log\Services;
use App\Services\Service;
use Simon\Log\Services\Interfaces\ActionLogInterface;
use Simon\Log\Models\ActionLog;
class ActionLogService extends Service implements ActionLogInterface
{
	
	public function __construct(ActionLog $ActionLog)
	{
		parent::__construct();
		$this->model = $ActionLog;
	}
	
	public function paginate() 
	{
		$paginate = $this->model->orderBy('id','desc')->paginate(15);
		
		return ['models'=>$paginate->items(),'page'=>$paginate->render()];
	}
	
}