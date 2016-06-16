<?php
namespace Simon\Hacker\Http\Controllers\Manage;
use App\Http\Controllers\Controller;
use Simon\Hacker\Services\UserSubject\Interfaces\UserSubjectInterface;
use Simon\User\Services\User\Interfaces\UserInterface;
class AnswerController extends Controller
{
	
	protected $view = 'hacker::manage.answer.';
	
	public function __construct(UserSubjectInterface $UserSubjectInterface) 
	{
		parent::__construct();
		
		if (module_exists('system'))
		{
			$this->middleware('Simon\System\Http\Middleware\Authenticate');
		}
		
		$this->service = $UserSubjectInterface;
	}
	
	public function getIndex() 
	{
		$paginate = $this->service->paginate();
		return $this->view('index',$paginate);
	}
	
	public function getShow($userId,UserInterface $UserInterface) 
	{
		$user = $UserInterface->find($userId);
		//获取该用户所有的题目和答案
		$answers = $this->service->userAnswers($userId);
		return $this->view('show',['user'=>$user,'models'=>$answers]);
	}
}