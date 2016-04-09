<?php

namespace Simon\File\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ImageOutside extends Event
{
    use SerializesModels;
    
    /**
     * 图集
     * @var array
     * @author simon
     */
    public $images = [];
    
    /**
     * 外键存储数据
     * @var array
     * @author simon
     */
    public $outside = [];
    
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $images,$outside_id,$outside_model)
    {
    	$this->images = $images;
    	$this->outside['id'] = $outside_id;
    	$this->outside['model'] = $outside_model;
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
