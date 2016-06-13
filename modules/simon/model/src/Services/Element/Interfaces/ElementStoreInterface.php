<?php
namespace Simon\Model\Services\Element\Interfaces;
interface ElementStoreInterface
{
	
	public function store(array $data,$mainId = 0);
	
}