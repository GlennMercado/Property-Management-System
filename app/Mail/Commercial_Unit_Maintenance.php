<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Commercial_Unit_Maintenance extends Mailable
{
    use Queueable, SerializesModels;

    protected $tenant;

    public function __construct($tenant, $cost)
    {
        $this->tenant = $tenant;
        $this->cost = $cost;
    }

    public function build()
    {
        return $this->subject('Commercial Space Under Maintenance')
            ->view('Admin.pages.CommercialSpaces.Mail.comm_maintenance')
            ->with(['tenant' => $this->tenant, 'cost' => $this->cost]);
    }
}
