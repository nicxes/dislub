<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InviteMailable extends Mailable
{
    use Queueable, SerializesModels;
    
    public $subject;
    public $organization;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($organization)
    {
        $this->organization = $organization;
        $this->subject = "Invitacion";
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.user.invite');
    }
}