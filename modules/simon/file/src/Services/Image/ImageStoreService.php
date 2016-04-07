<?php
namespace Simon\File\Services\Image;
use Simon\File\Services\Image;
use Simon\File\Services\Image\Interfaces\ImageStoreInterface;
use App\Services\Traits\StoreTrait;
class ImageStoreService extends Image implements ImageStoreInterface
{
	
	use StoreTrait;
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data)
	{
		// TODO Auto-generated method stub
		$this->model->path = $data['path'];
		$this->model->hash = $data['hash'];
		$this->model->alt = $data['alt'];
		$this->model->outside_id = $data['outside_id'];
		$this->model->outside_type = $data['outside_type'];
		$this->builtStore();
		$this->model->save();
		return $this->model;
	}

	
	
	
}