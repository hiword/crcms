<?php
namespace Simon\Hacker\Services\UserSubject;
use Simon\Hacker\Services\UserSubject;
use Simon\Hacker\Services\UserSubject\Interfaces\UserSubjectInterface;
use App\Facades\Auth;
class UserSubjectService extends UserSubject implements UserSubjectInterface
{
	
	public function userAnswer($subject_id) 
	{
		return $this->model->where('user_id',Auth::id())->where('subject_id',$subject_id)->first();
	}
	
	public function paginate(array $appends = []) 
	{
		$paginate = $this->model->groupBy('user_id')->paginate(15);
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
	public function userAnswers($userid)
	{
		return $this->model->select('user_subjects.*','subjects.title','subjects.score')->where('user_subjects.user_id',$userid)->join('subjects','user_subjects.subject_id','=','subjects.id')->orderBy('subjects.id','DESC')->get();
	}
		
}