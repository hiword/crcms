<?php
namespace Simon\System\Services\Admin\Interfaces;
use App\Services\Interfaces\StoreInterface;
use Illuminate\Http\Request;
interface AdminStoreInterface
{

	public function store(array $data,Request $Request); 
	
}