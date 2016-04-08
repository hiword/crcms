<?php
namespace Simon\File\Services\Image;
use Simon\File\Services\Image;
use Simon\File\Services\Image\Interfaces\ImageStoreInterface;
use App\Services\Traits\StoreTrait;
use Illuminate\Support\Facades\DB;
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
		
		$this->data['path'] = $data['path'];
		$this->data['hash'] = $data['hash'];
		$this->data['alt'] = $data['alt'];
		$this->data['outside_id'] = $data['outside_id'];
		$this->data['outside_type'] = $data['outside_type'];
		$this->builtModelStore();
		
		return $this->model->create($this->data);
	}

	
	
	
}