<?php
namespace Simon\Document\Services\ImageTemplates;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
class Db implements FilterInterface
{
	public function applyFilter(Image $image)
	{
		$width =  round($image->width() * 0.3);
		$height = round($image->height() * 0.3);
		
		if ($image->height() > $image->width())
		{
			$height = round($image->height() * 0.2);
		}
		
		return $image->fit($width,$height);
	}
}