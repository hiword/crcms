<?php
namespace Simon\Document\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Document\Models\Document;
use App\Services\Paginate;
use Illuminate\Support\Facades\Mail;
use Simon\Document\Models\Category;
use Simon\Document\Models\DocumentData;
use Illuminate\Support\Facades\DB;
use App\Exceptions\ValidateException;
use Simon\Document\Services\Document\Interfaces\DocumentInterface;
use Simon\Document\Services\Category\Interfaces\CategoryInterface;
class DocumentController extends Controller
{
	protected $categories = null;
	
	public function __construct(DocumentInterface $Document,CategoryInterface $CategoryInterface)
	{
		parent::__construct();
		
		$this->service = $Document;
		$this->categories = $CategoryInterface;
		
		$this->view = 'document::'.config('site.theme').'.document.';
		
		view()->share([
			'categories'=>$this->categories->lists(),
// 			'categories'=>$Category->where('status',1)->orderBy('created_at','desc')->get(),
		]);
		// 		Mail::send('emails.test', [], function($message)
		//         {
		//         	$message->to('28737164@qq.com', 'abc')->subject('subject');
		//         });
		// 		exit();
	}
	
	public function getB()
	{
		return $this->response('b');
	}
	
	public function getTest()
	{ 
		throw new ValidateException('abc');
		
		echo  '<img src="'.url('image',['template'=>'test','filename'=>rawurlencode('5/4/o_1acc4jd2c1gk1la21plpg181kfd7.jpg')]).'" alt="" />';
		echo '<hr />';
		echo '<hr />';
		echo '<hr />';
		echo '<img src="'.img_url('5/4/o_1acc4jd2c1gk1la21plpg181kfd7.jpg','test').'" alt="" />';
	}
	
	/**
	 * 列表页
	 * @param Paginate $Paginate
	 * @param _content 是否包含主内容
	 * @param page 分页标识
	 * @author simon
	 */
	public function getIndex($cid = 0) 
	{
		
		$paginate = $this->service->paginateFront($cid);
		
// 		if (!empty($cid) && is_numeric($cid))
// 		{
// 			$model = $Category->findOrFail($cid)->belongsToManyDocument();
// 		}

// 		$this->model = $this->model->where('status',1)->orderBy(Document::CREATED_AT,'desc');//->where('status',1);
		
// 		//附加内容
// 		if ($this->request->input('_content'))
// 		{
// 			foreach ($this->model as $model)
// 			{
// 				$model->hasOneDocumentData;
// 			}
// 		}
		
// 		$page = $Paginate->setUrlParams($this->data)->setPageSize(15)->page($this->model,function ($items){
// 			foreach ($items as $item)
// 			{
// 				$item->hash = create_hash($item->id);
// 			}
// 			return $items;
// 		});
		return $this->view("index",$paginate);
		//$this->service->documentPage($cid,$Paginate,$Category)
	}
	
	public function getTest2($id)
	{
		$this->model = $this->model->findOrFail($id);
		
		//content
		$this->model->hasOneDocumentData;
		$this->model->hasOneDocumentData;
		$this->model->hasOneDocumentData;
		$this->model->hasOneDocumentData;
		$this->model->hasOneDocumentData;
		return $this->response('test2',['model'=>$this->model]);
	}
	
	/**
	 * 内容页
	 * @param integer $id
	 * @author simon
	 */
	public function getShow($id)
	{
		$model = $this->service->find($id);
		
		$lists = $this->service->lists(10);
		
		$categories = $this->service->categories($model);
		
		$tags = $this->service->tags($model);
	
		return $this->view("show",['model'=>$model,'lists'=>$lists,'categories'=>$categories,'tags'=>$tags]);
	}
	
	public function postDocumentData(DocumentData $DocumentData)
	{
		$documentTable = $this->model->getTable();
		$DocumentDataTable = $DocumentData->getTable();
		$data = $this->model->join($DocumentDataTable,$documentTable.'.id','=',$DocumentDataTable.'.did')->select($DocumentDataTable.'.*')->whereIn($documentTable.'.id',(array)$this->data['id'])->where($documentTable.'.status','=',1)->get();
		return $this->response(['success'],['data'=>$data]);
	}
}