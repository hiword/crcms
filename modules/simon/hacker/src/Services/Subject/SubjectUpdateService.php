<?php
namespace Simon\Hacker\Services\Subject;
use Simon\Hacker\Services\Subject;
use Simon\Hacker\Services\Subject\Interfaces\SubjectUpdateInterface;
use App\Services\Traits\UpdateTrait;
use Illuminate\Support\Facades\Input;
class SubjectUpdateService extends Subject implements SubjectUpdateInterface
{
	use UpdateTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author simon
	 */
	public function update($id, array $data)
	{
		// TODO Auto-generated method stub
		$this->data['title'] = $data['title'];
		$this->data['answer'] = $data['answer'];
		$this->data['status'] = $data['status'];
		$this->data['sort'] = $data['sort'];
		$this->data['score'] = $data['score'];
		$this->data['content'] = format_xss(Input::get('content'));
		$this->builtDataUpdate();
		
		return $this->model->where('id',$id)->update($this->data);
	}

}