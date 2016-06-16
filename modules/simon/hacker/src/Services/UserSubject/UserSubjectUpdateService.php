<?php
namespace Simon\Hacker\Services\UserSubject;
use Simon\Hacker\Services\UserSubject;
use Simon\Hacker\Services\UserSubject\Interfaces\UserSubjectUpdateInterface;
use App\Facades\Auth;
class UserSubjectUpdateService extends UserSubject implements UserSubjectUpdateInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Hacker\Services\UserSubject\Interfaces\UserSubjectUpdateInterface::update()
	 * @author simon
	 */
	public function update(\Simon\Hacker\Models\Subject $subject, array $data)
	{
		// TODO Auto-generated method stub
		return $this->model->where('id',$data['id'])->where('user_id',Auth::id())->update(['answer'=>$data['answer']]);
	}

}