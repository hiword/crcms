<?php
namespace Simon\System\Http\Controllers;
use App\Http\Controllers\Controller;
use Toplan;
class IndexController extends Controller
{
	
	public function __construct()
	{
		$this->middleware('Simon\System\Http\Middleware\Authenticate');
		parent::__construct();
		$this->view = 'system::index.';
	}
	
	public function getIndex() 
	{
		return redirect('manage/subject/index');
		echo 2;exit();
		//echo 2;
		  var_dump(\PhpSms::make()->to('18715155081')->content('【Laravel SMS】亲爱的张三，欢迎访问，祝你工作愉快。')->send());
		  exit();
		return $this->response("{$this->view}index");
	}
	
}