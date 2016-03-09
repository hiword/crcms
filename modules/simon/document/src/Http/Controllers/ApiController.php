<?php
namespace Simon\Document\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Document\Models\Document;
use Simon\Document\Models\DocumentData;
use Simon\Document\Services\Document as DocumentService;
class ApiController extends Controller
{
	
	public function __construct(Document $Document,DocumentService $DocumentService)
	{
		parent::__construct();
		$this->model = $Document;
		$this->service = $DocumentService;
	}
	
	public function postDocumentData(DocumentData $DocumentData)
	{
		return $this->service->documentData($DocumentData);
	}
	
	public function postDocumentData(DocumentData $DocumentData)
	{
	
		$this->validateHash($this->data['id'],$this->data['_hash']);
		
		$model = $DocumentData->findOrFail($this->data['id']);
		
		return $this->response(['success'],['model'=>$model]);
		
// 		$documentTable = $this->model->getTable();
// 		$DocumentDataTable = $DocumentData->getTable();
// 		return $this->model->join($DocumentDataTable,$documentTable.'.id','=',$DocumentDataTable.'.did')->select($DocumentDataTable.'.*')->whereIn($documentTable.'.id',(array)$this->data['id'])->where($documentTable.'.status','=',1)->get();
	}
	
}