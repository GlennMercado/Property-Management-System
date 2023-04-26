<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TenantNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $tenant;

    public function __construct($tenant)
    {
        $this->tenant = $tenant;
    }

    public function build()
    {
        return $this->subject('Ending of Contract')
            ->view('Admin.pages.CommercialSpaces.Mail.tenant_notification')
            ->with('tenant', $this->tenant);
    }
}
