<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Application_Status extends Mailable
{
    use Queueable, SerializesModels;

    protected $tenant;

    public function __construct($tenant)
    {
        $this->tenant = $tenant;
    }

    public function build()
    {
        return $this->subject('Commercial Space Application')
            ->view('Admin.pages.CommercialSpaces.Mail.application_status')
            ->with('tenant', $this->tenant);
    }
}
