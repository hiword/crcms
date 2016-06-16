<?php
namespace Simon\Hacker\Services\UserSubject;
use Simon\Hacker\Services\UserSubject;
use Simon\Hacker\Services\UserSubject\Interfaces\UserSubjectStoreInterface;
use App\Facades\Auth;
class UserSubjectStoreService extends UserSubject implements UserSubjectStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Hacker\Services\UserSubject\Interfaces\UserSubjectStoreInterface::store()
	 * @author simon
	 */
	public function store(\Simon\Hacker\Models\Subject $subject, array $data)
	{
		// TODO Auto-generated method stub
		$this->model->subject_id = $data['subject_id'];
		$this->model->answer = $data['answer'];
		$this->model->user_id = Auth::id();
		$this->model->status = $subject->answer === $data['answer'] ? \Simon\Hacker\Models\UserSubject::STATUS_SUCCESS : \Simon\Hacker\Models\UserSubject::STATUS_ERROR;
		$this->model->save();
		return $this->model;
	}

	
}