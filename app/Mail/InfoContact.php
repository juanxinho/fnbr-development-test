<?php

namespace App\Mail;

use App\Models\InfoFuniber;
use App\Models\Program;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InfoContact extends Mailable
{
  use Queueable, SerializesModels;

  private $infoFuniber;
  private $program;

  /**
   * Create a new message instance.
   *
   * @return void
   */
  public function __construct(InfoFuniber $infoFuniber, Program $program) {
    $this->infoFuniber = $infoFuniber;
    $this->program = $program;
  }

  /**
   * Build the message.
   *
   * @return $this
   */
  public function build()
  {
    return $this->view('mails.contact', ['info' => $this->infoFuniber, 'program' => $this->program]);
  }
}
