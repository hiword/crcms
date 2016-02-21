<?php

namespace Simon\Mail\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class Mail extends Event
{
    use SerializesModels;
    
    /**
     * mail模板
     * @var string
     * @author simon
     */
    public $template = null;
    
    /**
     * Mail主题
     * @var string
     * @author simon
     */
    public $subject = null;
    
    /**
     * Mail邮箱
     * @var string
     * @author simon
     */
    public $email = null;
    
    /**
     * Create a new event instance.
     * @return void
     */
    public function __construct($template,$email,array $data = [],$subject = null)
    {
    	$this->template = $template;
    	$this->email = $email;
    	$this->data = $data;
    	$this->subject = empty($subject) ? config('site.web_name') : $subject;
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
