<?php

namespace Simon\Tag\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class TagOutside extends Event
{
    use SerializesModels;
    
    /**
     * 标签
     * @var array
     * @author simon
     */
    public $tags = [];
    
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
    public function __construct(array $tags,$outside_id,$outside_model)
    {
    	$this->tags = $tags;
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
