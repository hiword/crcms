<?php

namespace Simon\Log\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Logs extends Event
{
    use SerializesModels;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
//     public function __construct(array $logs = [])
//     {
//     	$this->logs = $logs;
//     }

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
