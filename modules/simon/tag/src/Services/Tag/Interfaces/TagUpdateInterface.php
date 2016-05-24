<?php
namespace Simon\Tag\Services\Tag\Interfaces;
use App\Services\Interfaces\UpdateInterface;
interface TagUpdateInterface extends UpdateInterface
{
	
	public function increment($tagId);
	
	public function decrement($tagId);
	
}