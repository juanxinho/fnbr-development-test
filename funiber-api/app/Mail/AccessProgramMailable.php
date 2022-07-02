<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccessProgramMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $user;


    /**
     * RegisterUserMail constructor.
     * @param $user
    
     */
    public function __construct($user)
    {
        $this->user = $user;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->subject( 'Access Program Funiber')->view('emails.info-email', ['user' => $this->user]);
         
    }
}