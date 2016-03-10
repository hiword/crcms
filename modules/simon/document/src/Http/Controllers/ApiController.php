<?php
namespace Simon\Document\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Document\Models\Document;
use Simon\Document\Models\DocumentData;
use Simon\Document\Services\Document as DocumentService;
use App\Services\Paginate;
class ApiController extends Controller
{
	
	public function __construct(Document $Document,DocumentService $DocumentService)
	{
		parent::__construct();
		
		$this->model = $Document;
		
		$this->service = $DocumentService;
	}
	
	public function getPage(Paginate $Paginate,$cid = 0)
	{
		$page = $this->service->page($Paginate,$cid,$this->data);
		return $this->response(['success'],$page);
	}
	
	public function postShow()
	{
		//$this->validateHash($this->data['id'],$this->data['hash']);
		
		$model = $this->service->single($this->data['id']);
		return $this->response(['success'],['model'=>$model]);
	}
	
	public function postDocumentData()
	{
		$descriptions = $this->service->descriptions($this->data['id'],$this->data['hash']);
		
		return $this->response(['success'],['models'=>$descriptions]);
	}
	
// 	public function postDocumentData(DocumentData $DocumentData)
// 	{
// 		return $this->service->documentData($DocumentData);
// 	}
	
// 	public function postDocumentData(DocumentData $DocumentData)
// 	{
	
// 		$this->validateHash($this->data['id'],$this->data['_hash']);
		
// 		$model = $DocumentData->findOrFail($this->data['id']);
		
// 		return $this->response(['success'],['model'=>$model]);
		
// // 		$documentTable = $this->model->getTable();
// // 		$DocumentDataTable = $DocumentData->getTable();
// // 		return $this->model->join($DocumentDataTable,$documentTable.'.id','=',$DocumentDataTable.'.did')->select($DocumentDataTable.'.*')->whereIn($documentTable.'.id',(array)$this->data['id'])->where($documentTable.'.status','=',1)->get();
// 	}
	
}