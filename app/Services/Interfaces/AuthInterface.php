<?php
namespace App\Services\Interfaces;
use App\Models\Model;
interface AuthInterface
{
	
	public function user();
	
	public function id();
	
	public function store(Model $user);
	
	public function logout(); 
	
}

