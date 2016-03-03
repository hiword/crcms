<?php
namespace Simon\Document\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Document\Models\Document;
use App\Services\Paginate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use Simon\Document\Models\Category;
class DocumentController extends Controller
{
	
	public function __construct(Document $Document,Category $Category)
	{
		parent::__construct();
		$this->model = $Document;
// 		$this->view = 'document::document.';
		$this->view = 'document::document.';
		
		
		view()->share([
			'categories'=>$Category->where('status',1)->orderBy('created_at','desc')->get(),
		]);
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
	public function getIndex(Paginate $Paginate,Category $Category,$cid = 0) 
	{
		if (!empty($cid) && is_numeric($cid))
		{
			$this->model = $Category->findOrFail($cid)->belongsToManyDocument();
		}

		$this->model = $this->model->where('status',1)->orderBy(Document::CREATED_AT,'desc');//->where('status',1);
		
		//附加内容
		if ($this->request->input('_content'))
		{
			foreach ($this->model as $model)
			{
				$model->hasOneDocumentData;
			}
		}
		
		$page = $Paginate->setUrlParams($this->data)->setPageSize(15)->page($this->model);
		return $this->response("index",$page);
	}
	
	/**
	 * 内容页
	 * @param integer $id
	 * @author simon
	 */
	public function getShow($id)
	{
		$this->model = $this->model->findOrFail($id);
		
		//content
		$this->model->hasOneDocumentData;
		
		return $this->response("show",['model'=>$this->model]);
	}
}