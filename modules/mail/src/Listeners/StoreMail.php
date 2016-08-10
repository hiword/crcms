<?php

namespace Mail\Listeners;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Mail\Services\Mail;

class StoreMail implements ShouldQueue
{
	
	use InteractsWithQueue,SerializesModels;
	
	protected $mail = null;
	
    /**
     * Create the event Listener.
     *
     * @return void
     */
    public function __construct(Mail $Mail)
    {
        //
        $this->mail = $Mail;
    }

    /**
     * Handle the event.
     *
     * @param  Register  $event
     * @return void
     */
    public function handle(Event $Event)
    {
    	$this->mail->log([
    			'email'=>$Event->email,
    			'subject'=>$Event->subject,
    			'template'=>$Event->template,
    			'data'=>$Event->data,
    	]);
    }
}
