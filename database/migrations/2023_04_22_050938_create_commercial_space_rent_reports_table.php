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
        Schema::create('commercial_space_rent_reports', function (Blueprint $table) {
            $table->id();

            $table->integer('Tenant_ID');
            $table->integer('Rental_Fee');
            $table->date('Due_Date');

            $table->date('Paid_Date')->nullable();
            $table->string('Payment_Status')->default('Paid');

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
        Schema::dropIfExists('commercial_space_rent_reports');
    }
};
