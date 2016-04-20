<?php

namespace Simon\Mail\Listeners;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;

class SendMail implements ShouldQueue
{
	
	use InteractsWithQueue,SerializesModels;
	
    /**
     * Create the event Listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Register  $event
     * @return void
     */
    public function handle(Event $Event)
    {
    	try 
    	{
    		Mail::send($Event->template, $Event->data, function($message) use ($Event)
	        {
	        	$message->to($Event->email, isset($Event->data['name']) ? $Event->data['name'] : null)->subject($Event->subject);
	        });
    	} 
    	catch (\Exception $e) 
    	{
    		logger(static::class.':'.$e->getMessage());
    		throw $e;
    	}
    }
}
