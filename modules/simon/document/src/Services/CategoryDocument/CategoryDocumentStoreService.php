<?php
namespace Simon\Document\Services\CategoryDocument;
use Simon\Document\Services\CategoryDocument;
use Simon\Document\Services\CategoryDocument\Interfaces\CategoryDocumentStoreInterface;
use Illuminate\Support\Facades\DB;
class CategoryDocumentStoreService extends CategoryDocument implements CategoryDocumentStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \Simon\Document\Services\CategoryDocument\Interfaces\CategoryDocumentStoreInterface::store()
	 * @author simon
	 */
	public function store($did, array $categoryIds,$type)
	{
		// TODO Auto-generated method stub
		foreach ($categoryIds as $categoryId)
		{
			$this->model->create([
					'category_id'=>$categoryId,
					'document_id'=>$did,
					'type'=>$type,
			]);
		}
	}

	
	
	
}