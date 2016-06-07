<?php
namespace Simon\Count\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Count\Services\Count\Interfaces\CountInterface;
class CountController extends Controller
{
	protected $view = 'count::manage.count.';
	
	public function __construct(CountInterface $CountInterface)
	{
		parent::__construct();
		$this->service = $CountInterface;
	}
	
	public function getIndex() 
	{
		$page = $this->service->paginate();
		return $this->view('index',$page);
	}
	
}