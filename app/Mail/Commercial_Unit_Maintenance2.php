<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Commercial_Unit_Maintenance2 extends Mailable
{
    use Queueable, SerializesModels;

    protected $tenant;

    public function __construct($tenant, $status)
    {
        $this->tenant = $tenant;
        $this->status = $status;
    }

    public function build()
    {
        return $this->subject('Commercial Space Unit Maintenance Status')
            ->view('Admin.pages.CommercialSpaces.Mail.comm_maintenance2')
            ->with(['tenant' => $this->tenant, 'status' => $this->status]);
    }
}
