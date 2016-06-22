<?php
namespace Simon\Document\Services\ImageTemplates;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
class Db implements FilterInterface
{
	public function applyFilter(Image $image)
	{
		if ($image->width() >= 800 ) 
		{
			$width = round($image->width() * 0.1);
		}
		else
		{
			$width =  round($image->width() * 0.3);
		}
		
		if ($image->height() >= 768)
		{
			$height = round($image->height() * 0.15);
		}
		else
		{
			$height = round($image->height() * 0.3);
			
			if ($image->height() > $image->width())
			{
				$height = round($image->height() * 0.2);
			}
		}
		
		return $image->fit($width,$height);
	}
}