<?php
namespace Simon\Comment\Services\Comment;
use Simon\Comment\Services\Comment;
use Simon\Comment\Services\Comment\Interfaces\CommentInterface;
use Simon\Comment\Models\CommentData;
class CommentService extends Comment implements CommentInterface
{
	
	public function find($id)
	{
		return $this->model->findOrFail($id);
	}
	
	public function findFull($id) 
	{
		$this->model = $this->find($id);
		$this->model->content = $this->model->hasOneCommentData->content;
		return $this->model;
	}
	
// 	protected function showAppend(\Simon\Comment\Models\Comment $Comment)
// 	{
// 		return $Comment->hasOneCommentData;
// 	}
	
	public function getOutsideList($outsideId,$outsideType) 
	{
		$models = $this->model->outside($outsideId,$outsideType)->orderBy('created_at','desc')->get();
		
		foreach ($models as $model)
		{
			$model->content = empty($model->hasOneCommentData->content) ? null : htmlspecialchars($model->hasOneCommentData->content);
			$model->user = module_exists('user') ? $model->hasOneUser : null;
		}
		return $models->toArray();
	}
}