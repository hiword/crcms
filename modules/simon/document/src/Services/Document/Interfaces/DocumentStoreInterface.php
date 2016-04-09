<?php
namespace Simon\Document\Services\Document\Interfaces;
interface DocumentStoreInterface
{
	
	public function store(array $data,array $append);
	
}