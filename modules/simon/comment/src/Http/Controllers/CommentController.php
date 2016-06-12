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
		//$this->view = 'comment::'.config('site.theme').'.comment.';
	}
	
	public function getIndex()
	{
		$type = rawurldecode($this->data['type']);
		$outId = $this->data['out_id'];
		
		$models = $this->service->getOutsideList($outId,$type);
		
		return view('comment::comment-list',['models'=>array_tree_child($models,0,'reply_id')]);
	}
	
	public function getCreate()
	{
		$type = rawurldecode($this->data['type']);
		$outId = $this->data['out_id'];
		return view('comment::create',['outside_type'=>$type,'outside_id'=>$outId,'img_path'=>config('comment.icon_path'),'img_num'=>config('comment.icon_num')]);
	}
	
	public function postStore(CommentStoreForm $CommentStoreForm,CommentStoreInterface $CommentStoreInterface)
	{
		
		$this->form->validator($CommentStoreForm);
		
		$model = $CommentStoreInterface->store($this->data,$this->request);
		
		$comment = $this->service->findFull($model->id);
		
		return $this->response(['app.success'],['model'=>$comment]);
	}
	
	
}