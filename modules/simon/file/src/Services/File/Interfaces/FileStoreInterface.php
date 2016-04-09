<?php
namespace Simon\File\Services\File\Interfaces;
use Illuminate\Http\Request;
interface FileStoreInterface 
{
	public function store(array $data,Request $Request);
}