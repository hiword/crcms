<?php
namespace Simon\Comment\Services;
use App\Services\Service;
use Simon\Comment\Models\Comment as CommentModel;
use Simon\Comment\Models\CommentData;
abstract class Comment extends Service
{
	
	public function __construct(CommentModel $Comment) 
	{
		parent::__construct();
		$this->model = $Comment;
	}
	
}