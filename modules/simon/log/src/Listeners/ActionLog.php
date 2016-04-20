<?php

namespace Simon\Log\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Simon\Log\Services\ActionLog\Interfaces\ActionLogStoreInterface;

class ActionLog implements ShouldQueue
{
	
	use InteractsWithQueue,SerializesModels;
	
	protected $log = null;
	
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(ActionLogStoreInterface $ActionLogStoreInterface)
    {
        //
        $this->log = $ActionLogStoreInterface;
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
    		$this->log->store($Event->data, app('request'),app('Jenssegers\Agent\Agent'));
    	} 
    	catch (\Exception $e) 
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    }
}
