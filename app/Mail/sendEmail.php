<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $tagEmail;
    public $textEmail;
    public $templateEmail;

    public function __construct($tagEmail, $textEmail, $templateEmail)
    {
        $this->tagEmail = $tagEmail;
        $this->textEmail = $textEmail;
        $this->templateEmail = $templateEmail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Confirmación de aceptación')
            ->view('templates.confirmation');
    }
}
