<?php
namespace Simon\Hacker\Services\Subject;
use Simon\Hacker\Services\Subject;
use Simon\Hacker\Services\Subject\Interfaces\SubjectInterface;
use Simon\Hacker\Models\Subject as SubjectModel;
class SubjectService extends Subject implements SubjectInterface
{
	
	public function status() 
	{
		return SubjectModel::STATUS;
	}
	
	public function paginate(array $appends = []) 
	{
		$paginate = $this->model->orderBy('id','desc')->paginate(15);
		
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
	public function paginateFront(array $appends = []) 
	{
		$paginate = $this->model->orderBy('sort','desc')->orderBy('id','asc')->paginate(15);
		
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
	public function find($id) 
	{
		return $this->model->findOrFail($id);
	}
	
}