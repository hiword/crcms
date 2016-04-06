<?php
namespace Simon\File\Services\Interfaces;
use Illuminate\Http\Request;
interface FileStoreInterface 
{
	
	public function store(array $data,Request $Request); 
	
}