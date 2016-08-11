<?php

namespace User\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Simon\Tag\Models\Tag;
use Illuminate\Support\Facades\DB;
use Simon\Tag\Services\Tag\Interfaces\TagInterface;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideStoreInterface;
use Simon\Tag\Services\Tag\Interfaces\TagStoreInterface;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideInterface;
use Simon\Tag\Services\Tag\Interfaces\TagDestroyInterface;
use Simon\Tag\Services\TagOutside\Interfaces\TagOutsideDestroyInterface;
use Simon\Tag\Services\Tag\Interfaces\TagUpdateInterface;
use User\Services\AuthLog;

class AuthLogListener implements ShouldQueue
{
	
	use InteractsWithQueue;
	
	protected $log = null;
	
    /**
     * Create the event handler.
     *
     * @return void
     */
    public function __construct(AuthLog $log)
    {
        //
        $this->log = $log;
    }

    /**
     * Handle the event.
     *
     * @param  Register  $event
     * @return void
     */
    public function handle(Event $Event)
    {
    	try {
    		$this->log->log($Event->type,$Event->data);
    	} catch (\Exception $e)
    	{
    		logger($e->getMessage());
    		throw $e;
    	}
    	
    }
}
