<?php
namespace Simon\Document\Services;
use App\Services\Service;
use Simon\Document\Models\Document as DocumentModel;
abstract class Document extends Service
{
	
	public function __construct(DocumentModel $Document) 
	{
		parent::__construct();
		$this->model = $Document;
	}
	
}