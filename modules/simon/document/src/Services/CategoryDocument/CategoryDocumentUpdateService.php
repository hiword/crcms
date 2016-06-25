<?php
namespace Simon\Document\Services\CategoryDocument;
use Simon\Document\Services\CategoryDocument;
use Simon\Document\Services\CategoryDocument\Interfaces\CategoryDocumentUpdateInterface;
class CategoryDocumentUpdateService extends CategoryDocument implements CategoryDocumentUpdateInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\UpdateInterface::update()
	 * @author simon
	 */
	public function update($did, array $data,$type)
	{
		// TODO Auto-generated method stub
		$this->model->where('document_id',$did)->where('type',$type)->delete();
		
		foreach ($data as $categoryId)
		{
			$this->model->create([
					'document_id'=>$did,
					'category_id'=>$categoryId,
					'type'=>$type,
			]);
		}
	}

	
	
	
}