<?php
namespace Simon\Comment\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Comment\Services\Comment\Interfaces\CommentInterface;
use Simon\Comment\Forms\Comment\CommentStoreForm;
use Simon\Comment\Services\Comment\Interfaces\CommentStoreInterface;
class CommentController extends Controller
{
	
	public function __construct(CommentInterface $Comment)
	{
		parent::__construct();
		$this->service = $Comment;
		$this->view = 'comment::'.config('site.theme').'.comment.';
	}
	
	public function getComment($outsideId,$outsideType)
	{
		$outsideType = base64_decode($outsideType);
		
		$this->service->getOutsideList($outsideId,$outsideType);
		
		$view = (string)view($this->view.'comment-list');
	}
	
	public function getCreate()
	{
		
	}
	
	public function postStore(CommentStoreForm $CommentStoreForm,CommentStoreInterface $CommentStoreInterface)
	{
		
		$this->form->validator($CommentStoreForm);
		
		$model = $CommentStoreInterface->store($this->data);
		
		$comment = $this->service->findFull($model->id);
		
		return $this->response(['app.success'],['model'=>$comment]);
	}
	
	
}