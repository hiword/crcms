<?php

namespace Simon\Log\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class ActionLog extends Event
{
    use SerializesModels;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
    	parent::__construct($data);
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return [];
    }
}
