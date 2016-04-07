<?php
namespace Simon\Document\Services\CategoryDocument\Interfaces;
interface CategoryDocumentStoreInterface
{
	
	public function store($did,array $categoryIds); 
	
}