<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Event_Inquiry extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $mail;

    public function __construct($mail, $name)
    {
        $this->mail = $mail;
        $this->name = $name;
    }

    public function build()
    {
        return $this->subject('Convention Center Inquiry')
            ->view('Admin.pages.Reservations.Mail.Event_Application')
            ->with(['mail' => $this->mail, 'name' => $this->name]);
    }
}
