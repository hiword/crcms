<?php
namespace Simon\File\Services\Image\Interfaces;
use App\Services\Interfaces\DestroyInterface;
interface ImageDestroyInterface extends DestroyInterface 
{
	
	public function outsideDestroy(array $outsideIds,$outsideType);
	
}