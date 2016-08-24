<?php

namespace Simon\User\Mails;

use App\Services\Interfaces\MailViewInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Simon\User\Models\User;

class RegisterMail extends Mailable implements MailViewInterface
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $user = null;

    public $hash = '';

    public function __construct(User $User,string $hash)
    {
        //
        $this->user = $User;
        $this->hash = $hash;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('user::emails.register');
    }


    public function getView() : string
    {
        // TODO: Implement getView() method.
        return (string)view($this->buildView(),$this->buildViewData());
    }

}
