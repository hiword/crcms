<?php
namespace App\Services\Interfaces;
interface UpdateInterface 
{
	/**
	 * 
	 * @param numeric ||  App\Models\Model $id
	 * @param array $data
	 * @author simon
	 */
	public function update($id,array $data); 
}