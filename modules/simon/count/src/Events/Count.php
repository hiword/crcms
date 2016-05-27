<?php
namespace Simon\Count\Events;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Count extends Event
{
    use SerializesModels;
    
    
    /**
     * 外键存储数据
     * @var array
     * @author simon
     */
    public $outside = [];
    
    public $agent = null;
    
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($outside_id,$outside_model)
    {
    	$this->outside['outside_id'] = $outside_id;
    	$this->outside['outside_type'] = $outside_model;
//     	$this->outside['client_ip'] = app('request')->ip();
    	$this->agent = app('Jenssegers\Agent\Agent');
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
