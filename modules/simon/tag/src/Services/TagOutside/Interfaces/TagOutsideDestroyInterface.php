<?php
namespace Simon\Tag\Services\TagOutside\Interfaces;
use App\Services\Interfaces\DestroyInterface;
interface TagOutsideDestroyInterface extends DestroyInterface
{
	
	public function tagAssocDestroy($tagId,$outsideId,$outsideType);
	
}