<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mail;
use App\Mail\TenantNotification;

class SendCommercialEmailCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'commercial:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Get the tenants whose end date is two months from now
        $twoMonthsFromNow = Carbon::now()->addMonths(2);
        
        $tenants = DB::table('commercial_spaces_tenants')
            ->join('commercial_spaces_applications', 'commercial_spaces_applications.id', '=', 'commercial_spaces_tenants.Tenant_ID')
            ->whereDate('End_Date', '=', $twoMonthsFromNow->format('Y-m-d'))
            ->get();

        // Send email to each tenant
        foreach ($tenants as $tenant) {
            Mail::to($tenant->email)->send(new TenantNotification($tenant));
        }
    }

}
