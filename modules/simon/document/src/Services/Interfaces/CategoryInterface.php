<?php
namespace Simon\Document\Services\Interfaces;

interface CategoryInterface
{
	
	public function find($id);
	
	public function tree(); 
	
	public function status();
	
}