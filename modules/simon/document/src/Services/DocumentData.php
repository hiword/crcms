<?php
namespace Simon\Document\Services;
use App\Services\Service;
use Simon\Document\Models\DocumentData as DocumentDataModel;
abstract class DocumentData extends Service
{
	
	public function __construct(DocumentDataModel $DocumentData) 
	{
		parent::__construct();
		$this->model = $DocumentData;
	}
	
}