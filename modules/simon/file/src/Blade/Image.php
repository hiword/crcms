<?php
namespace Simon\File\Blade;
use App\Blade\AbsBlade;
use Simon\File\Services\Image\Interfaces\ImageInterface;
class Image extends AbsBlade
{
	
	public function __construct(ImageInterface $ImageInterface)
	{
		$this->service = $ImageInterface;	
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Blade\BladeInterface::resolve()
	 * @author simon
	 */
	public function resolve($id,$namespace,$extension = [])
	{
		// TODO Auto-generated method stub
		return $this->service->lists($id,$namespace,$extension);
	}

	
}