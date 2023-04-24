<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Mail;
use App\Mail\TenantNotification;

class UpdateStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:status';

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
        //return Command::SUCCESS;
        $now = Carbon::now()->format('Y-m-d');
        
        DB::table('commercial_spaces_tenants')
            ->whereDate('End_Date', '=', $now)
            ->update(['Tenant_Status' => 'Ending Contract']);

        $tenants = DB::table('commercial_spaces_tenants')
                ->join('commercial_spaces_applications', 'commercial_spaces_applications.id', '=', 'commercial_spaces_tenants.Tenant_ID')
                ->whereDate('End_Date', '=', $now)
                ->get();

        // Send email to each tenant
        foreach ($tenants as $tenant) {
            Mail::to($tenant->email)->send(new TenantNotification($tenant));
        }
    }
}
