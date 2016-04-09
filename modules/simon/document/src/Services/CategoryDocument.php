<?php
namespace Simon\Document\Services;
use App\Services\Service;
use Simon\Document\Models\CategoryDocument as CategoryDocumentModel;
abstract class CategoryDocument extends Service
{
	
	public function __construct(CategoryDocumentModel $CategoryDocument) 
	{
		parent::__construct();
		$this->model = $CategoryDocument;
	}
	
}