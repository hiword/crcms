<?php
namespace Simon\Hacker\Services\Subject;
use Simon\Hacker\Services\Subject;
use Simon\Hacker\Services\Subject\Interfaces\SubjectStoreInterface;
use App\Services\Traits\StoreTrait;
use Illuminate\Support\Facades\Input;
class SubjectStoreService extends Subject implements SubjectStoreInterface
{
	use StoreTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		$this->model->title = $data['title'];
		$this->model->answer = $data['answer'];
		$this->model->status = $data['status'];
		$this->model->sort = $data['sort'];
		$this->model->score = $data['score'];
		$this->model->content = format_xss(Input::get('content'));
		$this->builtModelStore();
		$this->model->save();
		return $this->model;
	}

	
}