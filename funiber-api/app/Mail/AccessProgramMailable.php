<?php

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class AccessProgramMailable extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;


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
        
        $url = url('api/access_program/' . $this->token);
        return $this->from('wazza@youtube.com')->view('mail.register_user')->with([
            'name' => $this->user->name,
            'url' => $url
        ]);
        
    }
}