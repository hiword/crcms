<?php
namespace Simon\File\Services\Interfaces;
use Illuminate\Http\Request;
interface FileDataStoreInterface
{
	
	public function store($fid,array $data,Request $Request);
	
}