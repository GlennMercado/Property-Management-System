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
        Schema::create('out_of_order_rooms', function (Blueprint $table) {
            $table->id();

            $table->string('Facility_Type');
    
            $table->integer('Room_No')->nullable();
            $table->index('Room_No');
            $table->foreign('Room_No')->references('Room_No')->on('novadeci_suites')->onDelete('cascade')->onUpdate('cascade');

            $table->string('Booking_No');
            $table->index('Booking_No');
            $table->foreign('Booking_No')->references('Booking_No')->on('hotel_reservations')->onDelete('cascade')->onUpdate('cascade');
            
            $table->string('Description');   
            $table->string('Discovered_By')->nullable();
            $table->string('Priority_Level');
            $table->string('Status')->default('Ongoing');
            
            $table->boolean('IsArchived')->default(false);

            $table->timestamp('Date_Created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('Due_Date');
            $table->date('Date_Resolved')->nullable();
            
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
        Schema::dropIfExists('out_of_order_rooms');
    }
};
