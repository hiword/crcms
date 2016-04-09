<?php
namespace Simon\Document\Services\Document\Interfaces;
interface DocumentUpdateInterface
{

	public function update($id,array $data,array $append); 
	
}