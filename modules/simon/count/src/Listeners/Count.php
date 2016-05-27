<?php

namespace Simon\Count\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Illuminate\Support\Facades\DB;
use Simon\Count\Services\Count\Interfaces\CountStoreInterface;

class Count implements ShouldQueue
{
	
	use InteractsWithQueue;
	
	protected $countStore = null;
	
	
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(CountStoreInterface $CountStoreInterface)
    {
        //
        $this->countStore = $CountStoreInterface;
    }

    /**
     * Handle the event.
     *
     * @param  Register  $event
     * @return void
     */
    public function handle(Event $Event)
    {
    	try 
    	{
    		$this->countStore->store($Event->outside, $Event->agent,app('request'));
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}
