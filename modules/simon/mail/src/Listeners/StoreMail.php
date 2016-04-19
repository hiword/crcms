<?php

namespace Simon\Mail\Listeners;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Simon\Mail\Services\Mail\Interfaces\MailStoreInterface;

class StoreMail implements ShouldQueue
{
	
	use InteractsWithQueue,SerializesModels;
	
	protected $mail = null;
	
    /**
     * Create the event Listener.
     *
     * @return void
     */
    public function __construct(MailStoreInterface $MailStoreInterface)
    {
        //
        $this->mail = $MailStoreInterface;
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
    		$this->mail->store([
    			'email'=>$Event->email,
    			'subject'=>$Event->subject,
    			'template'=>$Event->template,
    		]);
    	} 
    	catch (\Exception $e) 
    	{
    		logger(static::class.':'.$e->getMessage());
    		throw $e;
    	}
    }
}
