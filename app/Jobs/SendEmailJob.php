<?php

namespace App\Jobs;

use App\Mail\sendEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $tagEmail;
    public $textEmail;
    public $templateEmail;
    public $userEmail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($tagEmail, $textEmail, $templateEmail, $userEmail)
    {
        $this->tagEmail = $tagEmail;
        $this->textEmail = $textEmail;
        $this->templateEmail = $templateEmail;
        $this->userEmail = $userEmail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $objUser = new sendEmail($this->tagEmail, $this->textEmail, $this->templateEmail);
        Mail::to($this->userEmail)
            ->send($objUser);
    }
}
