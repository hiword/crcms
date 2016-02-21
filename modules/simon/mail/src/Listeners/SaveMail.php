<?php

namespace Simon\Mail\Listeners;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;

class SaveMail implements ShouldQueue
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
    		$Mail = new \Simon\Mail\Models\Mail;
    		//添加入库
    		$Mail->storeData([
    				'email'=>$Event->email,
    				'subject'=>$Event->subject,
    				'template'=>$Event->template,
    				'content'=>view($Event->template,$Event->data),
    		]);
    	} 
    	catch (\Exception $e) 
    	{
    		logger(static::class.':'.$e->getMessage());
    		throw $e;
    	}
    }
}
