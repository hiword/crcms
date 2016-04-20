<?php

namespace Simon\Log\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;
use App\Models\Model;

class AuthLog extends Event
{
    use SerializesModels;
    
    public $user = null;
    
    public $type = null;
    
    public $status = null;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Model $Model,$type,$status)
    {
    	$this->user = $Model;
    	$this->type = $type;
    	$this->status = $status;
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
