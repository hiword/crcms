<?php
namespace Simon\Log\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Log\Models\ActionLog;
use App\Services\Paginate;
use Simon\Log\Services\ActionLog\Interfaces\ActionLogInterface;
class LogController extends Controller
{
	protected $view = 'log::manage.log.';
	
	public function __construct(ActionLogInterface $ActionLog)
	{
		
		//$this->middleware('Simon\System\Http\Middleware\Authenticate');
		parent::__construct();
		
		$this->service = $ActionLog;
	}
	
	public function getActionLog() 
	{
		$models = $this->service->paginate();
		return $this->view("action_log",$models);
	}
	
	public function getLoginLog(Paginate $Paginate,LoginLog $LoginLog) 
	{
		$page = $Paginate->page($LoginLog->orderBy('id','desc'));
		return $this->view("login_log",$page);
	}
}