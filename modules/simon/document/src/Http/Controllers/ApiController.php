<?php
namespace Simon\Document\Http\Controllers;
use App\Http\Controllers\Controller;
use Simon\Document\Models\Document;
use Simon\Document\Models\DocumentData;
class ApiController extends Controller
{
	
	public function __construct(Document $Document)
	{
		$this->model = $Document;
	}
	
	public function postDocumentData(DocumentData $DocumentData)
	{
		$documentTable = $this->model->getTable();
		$DocumentDataTable = $DocumentData->getTable();
		return $this->model->join($DocumentDataTable,$documentTable.'.id','=',$DocumentDataTable.'.did')->select($DocumentDataTable.'.*')->whereIn($documentTable.'.id',(array)$this->data['id'])->where($documentTable.'.status','=',1)->get();
	}
	
}