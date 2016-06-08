<?php
namespace Simon\Comment\Services\Comment;
use Simon\Comment\Services\Comment;
use Simon\Comment\Services\Comment\Interfaces\CommentStoreInterface;
use App\Services\Traits\StoreTrait;
use Simon\Comment\Models\CommentData;
class CommentStoreService extends Comment implements CommentStoreInterface
{
	
	use StoreTrait;
	
	public function __construct(\Simon\Comment\Models\Comment $Comment,CommentData $CommentData)
	{
		parent::__construct($Comment);
		$this->append = $CommentData;
	}
	
	
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Comment\Services\Comment\Interfaces\CommentStoreInterface::store()
	 * @author simon
	 */
	public function store(array $data, \Illuminate\Http\Request $Request)
	{
		// TODO Auto-generated method stub
		$this->model->reply_id = isset($data['reply_id']) ? intval($data['reply_id']) : 0;
		$this->model->client_ip = ip_long($Request->ip());
		$this->model->outside_id = $data['outside_id'];
		$this->model->outside_type = $data['outside_type'];
		//这里先默认为未审核
		$this->model->status = \Simon\Comment\Models\Comment::STATUS_NOT_AUDIT;
		$this->builtModelStore();
		$this->model->save();
		
		$this->append->cid = $this->model->id;
		$this->append->content = $data['content'];
		$this->append->save();
		
		return $this->model;
	}


// 	/*
// 	 * (non-PHPdoc)
// 	 * @see \App\Services\Interfaces\StoreInterface::store()
// 	 * @author simon
// 	 */
// 	public function store(array $data)
// 	{
// 		// TODO Auto-generated method stub
		
// 		// 		$this->model->client_ip = ip_long($ip)
	
// 		// 		$table->char('outside_type',50);
// 		// 		$table->mediumInteger('outside_id',false,true)->default(0);
	
// 		$this->builtModelStore();
// 	}

	
}