<?php

namespace Simon\User\Services\User\Interfaces;

use Illuminate\Http\Request;
interface UserRegisterInterface
{
	
	public function store(array $data,Request $Request);
	
	public function toMailLink();
	
	public function verfiyMailLink($id,$time,$rand,$hash); 
	
	public function checkMailVerifyStatus($id);
	
	public function updateMailVerifyStatus($id);
	
}
