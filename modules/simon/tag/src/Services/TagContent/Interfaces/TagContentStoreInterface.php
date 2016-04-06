<?php
namespace Simon\Tag\Services\TagContent\Interfaces;
interface TagContentStoreInterface
{
	
	/**
	 * 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store($tid,array $data);
	
}
