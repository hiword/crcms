<?php
namespace Simon\Hacker\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Hacker\Services\Subject\Interfaces\SubjectInterface;
use Illuminate\Support\Facades\DB;
use Simon\Hacker\Services\UserSubject\Interfaces\UserSubjectInterface;
use Simon\Hacker\Forms\UserSubject\UserSubjectStoreForm;
use App\Exceptions\AppException;
use Simon\Hacker\Services\UserSubject\Interfaces\UserSubjectStoreInterface;
use Simon\Hacker\Forms\UserSubject\UserSubjectUpdateForm;
use Simon\Hacker\Services\UserSubject\Interfaces\UserSubjectUpdateInterface;
class HackerController extends Controller
{
	protected $view = '';
	
	protected $subject = null;
	
	protected $userSubject = null;
	
	public function __construct(SubjectInterface $SubjectInterface,UserSubjectInterface $UserSubjectInterface)
	{
		parent::__construct();
		
		$this->middleware('Simon\User\Http\Middleware\Authenticate');
		
		$this->view = 'hacker::'.config('site.theme').'.hacker.';
		
		$this->subject = $SubjectInterface;
		$this->userSubject = $UserSubjectInterface;
	}
	
	public function getIndex() 
	{
		$paginate = $this->subject->paginateFront();
		
		return $this->view('index',$paginate);
	}
	
	public function getShow($id) 
	{
		$subject = $this->subject->find($id);
		
		//判断是否填写过答案
		$userSubject = $this->userSubject->userAnswer($id);
		
		return $this->view('show',['model'=>$subject,'user_subject'=>$userSubject]);
	}
	
	/**
	 * 存储用户答案
	 * @param UserSubjectStoreForm $UserSubjectStoreForm
	 * @param UserSubjectStoreInterface $UserSubjectStoreInterface
	 * @throws AppException
	 * @author simon
	 */
	public function postStore(UserSubjectStoreForm $UserSubjectStoreForm,UserSubjectStoreInterface $UserSubjectStoreInterface) 
	{
		$subject = $this->subject->find($this->data['subject_id']);
		
		//判断是否填写过答案
		$userSubject = $this->userSubject->userAnswer($this->data['subject_id']);
		if ($userSubject)
		{
			throw new AppException('您已经填写过答案');
		}
		
		$this->form->validator($UserSubjectStoreForm);
		
		$UserSubjectStoreInterface->store($subject, $this->data);
		
		return $this->response(['app.success']);
	}
	
	public function putUpdate($id,UserSubjectUpdateForm $UserSubjectUpdateForm,UserSubjectUpdateInterface $UserSubjectUpdateInterface) 
	{
		$subject = $this->subject->find($this->data['subject_id']);
		
		//判断是否填写过答案
		$userSubject = $this->userSubject->userAnswer($this->data['subject_id']);
		if (empty($userSubject))
		{
			throw new AppException('未填写答案无法修改');
		}
		
		$this->form->validator($UserSubjectUpdateForm);
		
		$UserSubjectUpdateInterface->update($subject, $this->data);
		
		return $this->response(['app.success']);
	}
	
	public function getStart($id) 
	{
		$subject = $this->subject->find($id);
		if ($subject->file)
		{
			return require public_path('scripts'.$subject->file);
		}
	}
}