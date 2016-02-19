<?php
namespace Simon\Document\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Document\Models\Document;
use App\Services\Paginate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
class DocumentController extends Controller
{
	
	public function __construct(Document $Document)
	{
		parent::__construct();
		$this->model = $Document;
		$this->view = 'document::document.';
		

		// 		Mail::send('emails.test', [], function($message)
		//         {
		//         	$message->to('28737164@qq.com', 'abc')->subject('subject');
		//         });
		// 		exit();
	}
	
	/**
	 * 列表页
	 * @param Paginate $Paginate
	 * @param _content 是否包含主内容
	 * @param page 分页标识
	 * @author simon
	 */
	public function getIndex(Paginate $Paginate) 
	{
		
		$this->model = $this->model->orderBy(Document::CREATED_AT,'desc');//->where('status',1);
		
		//附加内容
		if ($this->request->input('_content'))
		{
			foreach ($this->model as $model)
			{
				$model->hasOneDocumentData;
			}
		}
		
		$page = $Paginate->setUrlParams($this->data)->page($this->model);
		return $this->response("{$this->view}index",$page);
	}
	
	/**
	 * 内容页
	 * @param integer $id
	 * @author simon
	 */
	public function getShow($id)
	{
		$this->model = $this->model->find($id);
		
		//content
		$this->model->hasOneDocumentData;
		
		return $this->response("{$this->view}show",['model'=>$this->model]);
	}
	
}