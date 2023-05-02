<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Tenant_Status extends Mailable
{
    use Queueable, SerializesModels;

    protected $tenant;

    public function __construct($tenant)
    {
        $this->tenant = $tenant;
    }

    public function build()
    {
        return $this->subject('Commercial Spaces Status')
            ->view('Admin.pages.CommercialSpaces.Mail.tenant_status')
            ->with('tenant', $this->tenant);
    }
}
