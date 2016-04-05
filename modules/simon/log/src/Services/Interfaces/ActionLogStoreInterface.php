<?php
namespace Simon\Log\Services\Interfaces;
use App\Services\Interfaces\StoreInterface;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
interface ActionLogStoreInterface extends StoreInterface
{
	
	/**
	 * 
	 * (non-PHPdoc)
	 * @see \App\Services\Interfaces\StoreInterface::store()
	 * @author simon
	 */
	public function store(array $data,Request $Request,Agent $Agent = null);
	
}