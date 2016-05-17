<?php
namespace Simon\File\Http\Controllers;
use Intervention\Image\ImageCacheController;
class ImageController extends ImageCacheController
{
	
	public function getOriginal($filename)
	{
		$filename = base64_decode($filename);
	
		return parent::getOriginal($filename);
	}
	
	public function getImage($template, $filename) 
	{
		$filename = base64_decode($filename);
		
		return parent::getImage($template, $filename);
	}
}