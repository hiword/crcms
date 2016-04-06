<?php

namespace Simon\Log\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;

class Logs implements ShouldQueue
{
	
	use InteractsWithQueue,SerializesModels;
	
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
    			app($key)->store($values,app('request'),app('Jenssegers\Agent\Agent'));
    		}
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}
