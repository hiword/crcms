<?php
namespace Simon\Tag\Services\Tag\Interfaces;
use App\Services\Interfaces\StoreInterface;
interface TagStoreInterface extends StoreInterface
{
	
	public function userStore(array $data); 
	
	
	
}
