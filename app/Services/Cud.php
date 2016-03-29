<?php
namespace App\Services;
use App\Services\Interfaces\CudInterface;
class Cud 
{
	public function save($data,CudInterface $Cud) 
	{
		$Cud->save($data);
	}
}