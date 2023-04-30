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

    public function __construct($tenant, $space_unit)
    {
        $this->tenant = $tenant;
        $this->space_unit = $space_unit;
    }

    public function build()
    {
        return $this->subject('Application Status')
            ->view('Admin.pages.CommercialSpaces.Mail.application_status')
            ->with(['tenant' => $this->tenant, 'space_unit' => $this->space_unit]);
    }
}
