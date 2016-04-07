<?php
namespace Simon\Log\Services\ActionLog\Interfaces;
use App\Services\Interfaces\StoreInterface;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
interface ActionLogStoreInterface
{
	
	/**
	 * 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data,Request $Request,Agent $Agent = null);
	
}