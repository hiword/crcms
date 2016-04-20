<?php

namespace Simon\Log\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Simon\Log\Services\AuthLog\Interfaces\AuthLogStoreInterface;

class AuthLog implements ShouldQueue
{
	
	use InteractsWithQueue,SerializesModels;
	
	protected $log = null;
	
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(AuthLogStoreInterface $AuthLogStoreInterface)
    {
        //
        $this->log = $AuthLogStoreInterface;
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
    		$this->log->store($Event->type,$Event->status,$Event->user, app('request'));
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}
