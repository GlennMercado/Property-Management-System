<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commercial_spaces_tenant_deposit_reports', function (Blueprint $table) {
            $table->id();

            $table->integer('Tenant_ID');
           
            $table->integer('Security_Deposit');

            $table->date('Paid_Date');

            $table->string("Remarks")->default("For Advanced Two (2) Months of the lease term");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commercial_spaces_tenant_deposit_reports');
    }
};
