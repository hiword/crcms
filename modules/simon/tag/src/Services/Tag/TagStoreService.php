<?php
namespace Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag;
use Simon\Tag\Services\Tag\Interfaces\TagStoreInterface;
class TagStoreService extends Tag implements TagStoreInterface
{
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author root
	 */
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		$this->model->name = $data['name'];
		$this->model->status = $data['status'];
		
		$this->model->save();
		
		return $this->model;
	}

	
	
	
}