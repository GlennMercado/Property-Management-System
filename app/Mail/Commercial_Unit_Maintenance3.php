<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Commercial_Unit_Maintenance3 extends Mailable
{
    use Queueable, SerializesModels;

    protected $tenant;

    public function __construct($tenant, $others, $cost)
    {
        $this->tenant = $tenant;
        $this->others = $others;
        $this->cost = $cost;
    }

    public function build()
    {
        return $this->subject('Commercial Space Unit Under Maintenance')
            ->view('Admin.pages.CommercialSpaces.Mail.comm_maintenance3')
            ->with(['tenant' => $this->tenant, 'others' => $this->others, 'cost' => $this->cost]);
    }
}
