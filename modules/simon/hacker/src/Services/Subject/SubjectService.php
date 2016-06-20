<?php
namespace Simon\Hacker\Services\Subject;
use Simon\Hacker\Services\Subject;
use Simon\Hacker\Services\Subject\Interfaces\SubjectInterface;
use Simon\Hacker\Models\Subject as SubjectModel;
use App\Facades\Auth;
use Simon\Hacker\Models\UserSubject;
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
	
	public function lists()
	{
		$models = $this->model->orderBy('id','desc')->get();
		foreach ($models as $model)
		{
			if($model->hasOneUserSubject)
			{
				$model->answer_status_code = $model->hasManyUserSubject()->where('user_id',Auth::id())->value('status');
				$model->answer_status = $model->answer_status_code==UserSubject::STATUS_SUCCESS ? 'ok' : 'remove';
			}
			else
			{
				$model->answer_status_code = 0;
				$model->answer_status = '';
			}
		}
		return $models;
	}
	
	/* public function paginateFront(array $appends = []) 
	{
		$paginate = $this->model->orderBy('sort','desc')->orderBy('id','asc')->paginate(15);
		$models = $paginate->items();
		foreach ($models as $model)
		{
			if($model->hasOneUserSubject)
			{
				$model->answer_status_code = $model->hasOneUserSubject()->where('user_id',Auth::id())->value('status');
				$model->answer_status = $model->answer_status_code==UserSubject::STATUS_SUCCESS ? 'ok' : 'remove';
			}
			else
			{
				$model->answer_status_code = 0;
				$model->answer_status = '';
			}
		}
		return ['models'=>$models,'page'=>$paginate->appends($appends)->render()];
	} */
	
	public function find($id) 
	{
		return $this->model->findOrFail($id);
	}
	
}