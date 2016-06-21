<?php
namespace Simon\KillBox\Http\Controllers;
use App\Http\Controllers\Controller;
class IndexController extends Controller
{
	
	public function __construct()
	{
		
		parent::__construct();
		
// 		$this->middleware('Simon\User\Http\Middleware\Authenticate');
		
// 		$this->view = 'killBox::'.config('site.theme').'.index.';
		$this->view = 'killBox::killBox.index.';
	}
	
	public function getIndex() 
	{
		return $this->view('index');
	}
	
	public function getShow($id) 
	{
		$subject = $this->subject->find($id);
		
		//判断是否填写过答案
		$userSubject = $this->userSubject->userAnswer($id);
		
		return $this->view('show',['id'=>$id,'model'=>$subject,'user_subject'=>$userSubject]);
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