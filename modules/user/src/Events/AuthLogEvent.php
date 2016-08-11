<?php

namespace User\Events;

use App\Events\Event;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

class AuthLogEvent extends Event
{
    //
    
    use SerializesModels;
    
    public $ip = '';
    
    public $type = 0;
    
    public function __construct(int $type,array $data)
    {
    	$this->type = $type;
        $this->data = $data;
    }
    
}
