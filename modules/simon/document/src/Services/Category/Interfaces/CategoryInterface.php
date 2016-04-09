<?php
namespace Simon\Document\Services\Category\Interfaces;

interface CategoryInterface
{
	
	public function find($id);
	
	public function tree(); 
	
	public function status();
	
}