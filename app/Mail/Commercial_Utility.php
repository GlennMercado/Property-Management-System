<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Commercial_Utility extends Mailable
{
    use Queueable, SerializesModels;

    protected $tenant;

    public function __construct($tenant)
    {
        $this->tenant = $tenant;
    }

    public function build()
    {
        return $this->subject('Commercial Space Statement of Account (SOA)')
            ->view('Admin.pages.CommercialSpaces.Mail.comm_utility')
            ->with('tenant', $this->tenant);
    }
}
