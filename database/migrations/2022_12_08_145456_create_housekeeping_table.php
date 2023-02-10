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
        Schema::create('housekeepings', function (Blueprint $table) {
            $table->increments('ID');

            $table->integer('Room_No');
            $table->index('Room_No');
            $table->foreign('Room_No')->references('Room_No')->on('novadeci_suites')->onDelete('cascade')->onUpdate('cascade');

            $table->string('Booking_No');
            $table->index('Booking_No');
            $table->foreign('Booking_No')->references('Booking_No')->on('hotel_reservations')->onDelete('cascade')->onUpdate('cascade');
                       
            $table->string('Facility_Type');

            $table->string('Facility_Status');
            $table->string('Housekeeping_Status')->default('Cleaned');
            $table->string('Front_Desk_Status');

            $table->string('Request_ID')->nullable();
            $table->index('Request_ID');
            $table->foreign('Request_ID')->references('Request_ID')->on('guest_requests')->onDelete('cascade')->onUpdate('cascade');

            $table->string('Attendant')->default('Unassigned');
            
            $table->date('Check_In_Date');
            $table->date('Check_Out_Date');

            $table->boolean('IsArchived')->default(false);

            $table->timestamps();

            /*$table->foreign('Room_No')
            ->references('Room_No')
            ->on('novadeci_suites')
            ->onUpdate('Cascade')
            ->onDelete('Cascade');*/


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('housekeepings');
    }
};
