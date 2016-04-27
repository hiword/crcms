<?php
namespace Simon\Document\Blade;
use App\Blade\AbsBlade;
use App\Blade\BladeInterface;
use Simon\Document\Services\Category\Interfaces\CategoryInterface;
class Category extends AbsBlade
{
	
	public function __construct(CategoryInterface $CategoryInterface)
	{
		$this->service = $CategoryInterface;	
	}
	
	/* 
	 * (non-PHPdoc)
	 * @see \App\Blade\BladeInterface::resolve()
	 * @author simon
	 */
	public function resolve($url)
	{
		// TODO Auto-generated method stub
		return $this->service->lists();
	}

	
}