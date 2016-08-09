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
    
    public function __construct(array $data,string $ip)
    {
        $this->data = $data;
        $this->ip = $ip;
    }
    
}
