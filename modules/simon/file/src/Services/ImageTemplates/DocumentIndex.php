<?php
namespace Simon\File\Services\ImageTemplates;
use Intervention\Image\Filters\FilterInterface;
use Intervention\Image\Image;
class DocumentIndex implements FilterInterface
{
	public function applyFilter(Image $image)
	{
		return $image->fit(350,260);
	}
}