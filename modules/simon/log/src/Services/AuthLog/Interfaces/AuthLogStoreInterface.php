<?php
namespace Simon\Log\Services\AuthLog\Interfaces;
use Illuminate\Http\Request;
use App\Models\Model;
interface AuthLogStoreInterface
{
	
	public function store($type,$status,Model $user,Request $Request);
	
}