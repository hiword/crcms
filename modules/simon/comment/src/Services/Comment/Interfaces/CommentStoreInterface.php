<?php
namespace Simon\Comment\Services\Comment\Interfaces;
use App\Services\Interfaces\StoreInterface;
use Illuminate\Http\Request;
interface CommentStoreInterface
{
	
	public function store(array $data,Request $Request); 
	
}