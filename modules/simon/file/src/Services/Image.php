<?php
namespace Simon\File\Services;
use App\Services\Service;
use Simon\File\Models\Image as ImageModel;
abstract class Image extends Service
{
	
	public function __construct(ImageModel $Image) 
	{
		parent::__construct();
		$this->model = $Image;
	}
	
}