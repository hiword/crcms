<?php
namespace Simon\Hacker\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Hacker\Services\Subject\Interfaces\SubjectInterface;
use Illuminate\Support\Facades\DB;
class HackerController extends Controller
{
	protected $view = '';
	
	public function __construct(SubjectInterface $SubjectInterface)
	{
		parent::__construct();
		
		$this->middleware('Simon\User\Http\Middleware\Authenticate');
		
		$this->view = 'hacker::'.config('site.theme').'.hacker.';
		
		$this->service = $SubjectInterface;
	}
	
	public function getIndex() 
	{
		$paginate = $this->service->paginateFront();
		
		return $this->view('index',$paginate);
	}
	
}