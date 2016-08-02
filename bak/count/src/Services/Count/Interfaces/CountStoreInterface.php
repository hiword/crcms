<?php
namespace Simon\Count\Services\Count\Interfaces;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
interface CountStoreInterface 
{
	
	public function store(array $data,Agent $Agent,Request $Request = null);
	
}