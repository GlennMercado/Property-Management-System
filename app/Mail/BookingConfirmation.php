<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $stats2;

    public function __construct($name, $stats2)
    {
        $this->name = $name;
        $this->stats2 = $stats2;
    }

    public function build()
    {
        return $this->subject('Booking Confirmation')
            ->view('Admin.pages.Reservations.Mail.BookingConfirmation')
            ->with(['name' => $this->name, 'stats2' => $this->stats2]);
    }
}
