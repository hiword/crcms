<?php
namespace Simon\File\Services\ImageTemplates;
use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;

class Test implements FilterInterface
{
	public function applyFilter(Image $image)
	{
		return $image->fit(100, 100);
		
	}
}