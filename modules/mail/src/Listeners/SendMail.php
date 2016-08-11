<?php

namespace Mail\Listeners;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Mail\Services\Mail;

class SendMail implements ShouldQueue
{
	
	use InteractsWithQueue,SerializesModels;
	
	protected $mail = null;
	
    /**
     * Create the event Listener.
     *
     * @return void
     */
    public function __construct(Mail $mail)
    {
        //
        $this->mail = $mail;
    }

    /**
     * Handle the event.
     *
     * @param  Register  $event
     * @return void
     */
    public function handle(Event $Event)
    {
    	$this->mail->sendMail($Event->email, $Event->subject ?? '', $Event->template, $Event->data);
    }
}
