<?php

namespace Simon\Log\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Http\Request;
use Jenssegers\Agent\Agent;

class Logs extends Event
{
    use SerializesModels;
    
    
    /**
     * 
     * @var Illuminate\Http\Request
     * @author simon
     */
    public $request = null;
    
    /**
     * 
     * @var Jenssegers\Agent\Agent
     * @author simon
     */
    public $agent = null;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $data)
    {
    	parent::__construct($data);
//     	dd($Request,$Agent);
//     	$this->request = $Request;
//     	$this->agent = $Agent;
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
