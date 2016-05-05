<?php
namespace Simon\File\Services\Image;
use Simon\File\Services\Image;
use Simon\File\Services\Image\Interfaces\ImageInterface;
class ImageService extends Image implements ImageInterface
{
	
	public function lists($outsideId,$outsideType,$extension = []) 
	{
		$this->model = $this->model->where('outside_id',$outsideId)->where('outside_type',$outsideType);
		
		if ($extension)
		{
			$this->model->whereIn('extension',$extension);
		}
		
		return $this->model->get();
	}
	
}