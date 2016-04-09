<?php
namespace Simon\File\Services\Image;
use Simon\File\Services\Image;
use Simon\File\Services\Image\Interfaces\ImageInterface;
class ImageService extends Image implements ImageInterface
{
	
	public function outside($outsideId,$outsideType) 
	{
		return where('outside_id',$Event->outside['id'])->where('outside_type',$Event->outside['model'])->get();
	}
	
}