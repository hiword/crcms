<?php
namespace Simon\Tag\Blade;
use App\Blade\AbsBlade;
use Simon\Tag\Services\Tag\Interfaces\TagInterface;
class Tag extends AbsBlade
{
	public function __construct(TagInterface $TagInterface)
	{
		$this->service = $TagInterface;
	}
	
	public function resolve() 
	{
		return $this->service->hostTags();
	}
	
}