<?php
namespace App\Services;
use App\Services\Interfaces\StoreInterface;
use App\Services\Interfaces\UpdateInterface;
class Cud 
{
	public function store(array $data,StoreInterface $StoreInterface)
	{
		return $StoreInterface->store($data);
	}

	public function update($id,$data,UpdateInterface $UpdateInterface)
	{
		return $UpdateInterface->update($id, $data);
	}
	
	
}