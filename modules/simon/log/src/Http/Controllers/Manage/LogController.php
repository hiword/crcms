<?php
namespace Simon\Log\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Log\Models\ActionLog;
use App\Services\Paginate;
use Simon\Log\Models\LoginLog;
class LogController extends Controller
{
	
	public function __construct(ActionLog $ActionLog)
	{
		
		$this->middleware('Simon\System\Http\Middleware\Authenticate');
		
		parent::__construct();
		$this->view = 'log::manage.log.';
	}
	
	public function getActionLog(Paginate $Paginate,ActionLog $ActionLog) 
	{
		$page = $Paginate->page($ActionLog->orderBy('id','desc'));
		return $this->response("{$this->view}action_log",$page);
	}
	
	public function getLoginLog(Paginate $Paginate,LoginLog $LoginLog) 
	{
		$page = $Paginate->page($LoginLog->orderBy('id','desc'));
		return $this->response("{$this->view}login_log",$page);
	}
}