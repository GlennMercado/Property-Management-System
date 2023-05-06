<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Event_Confirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function build()
    {
        return $this->subject('Convention Center Inquiry')
            ->view('Admin.pages.Reservations.Mail.EventConfirmation')
            ->with('client', $this->client);
    }
}
