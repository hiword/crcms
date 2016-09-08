<?php

namespace Simon\User\Mails;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Simon\Mail\Services\Interfaces\MailViewInterface;
use Simon\Mail\Services\Traits\MailView;
use Simon\User\Models\User;

class VerifyUserMail extends Mailable implements MailViewInterface
{
    use Queueable, SerializesModels,MailView;

    public $user = null;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('user::emails.verify');
    }
}
