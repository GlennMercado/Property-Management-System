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
    protected $utility;

    public function __construct($tenant, $utility)
    {
        $this->tenant = $tenant;
        $this->utility = $utility;
    }

    public function build()
    {
        return $this->subject('Commercial Space Utility Bill')
            ->view('Admin.pages.CommercialSpaces.Mail.comm_utility')
            ->with(['tenant' => $this->tenant, 'utility' => $this->utility]);
    }
}
