<?php
namespace Simon\Document\Services\CategoryDocument\Interfaces;
interface CategoryDocumentUpdateInterface
{
	
	public function update($did,array $categoryIds,$type);
	
}