<?php
namespace Simon\Log\Services\AuthLog\Interfaces;
use Illuminate\Http\Request;
interface AuthLogStoreInterface
{
	const TYPE_REGISTER = 'register';
	
	const TYPE_LOGIN = 'login';
	
	const STATUS_SUCCESS = 1;
	
	const STATUS_ERROR = 2;
	
	public function store($type,$status,array $data,Request $Request);
	
}