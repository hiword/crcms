<?php

namespace Simon\Log\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;

class Logs implements ShouldQueue
{
	
	use InteractsWithQueue;
	
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
    		foreach ($Event->data as $key=>$values)
    		{
    			$Service = new $key();
    			$Service->store($values,$Event->request,$Event->agent);
    		}
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}
