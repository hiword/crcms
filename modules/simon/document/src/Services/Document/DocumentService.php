<?php
namespace Simon\Document\Services\Document;
use Simon\Document\Services\Interfaces\DocumentInterface;
use Simon\Document\Models\Document as DocumentModel;
use Simon\Document\Services\Document;
class DocumentService extends Document implements DocumentInterface
{
	
	public function paginate(array $appends = [])
	{
		$paginate = $this->model->orderBy(DocumentModel::CREATED_AT,'DESC')->paginate(2);
		return ['models'=>$paginate->items(),'page'=>$paginate->appends($appends)->render()];
	}
	
}