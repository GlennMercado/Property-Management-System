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
        Schema::create('hotel_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('Booking_No');
            $table->unique('Booking_No');
            
            $table->integer('Room_No');
            $table->index('Room_No');
            $table->foreign('Room_No')->references('Room_No')->on('novadeci_suites')->onDelete('cascade')->onUpdate('cascade'); 

            $table->string('Guest_Name');
            $table->string('Mobile_Num');
            $table->string('Email')->nullable();
        
            $table->integer('No_of_Pax');

            $table->string('Payment_Status')->default('Pending');
            $table->string('Booking_Status')->nullable();

            $table->boolean('IsArchived')->default(false);

            $table->string('Reference_No');
            $table->double('Payment')->nullable();

            $table->date('Check_In_Date');
            $table->date('Check_Out_Date');
            $table->date('Check_Out_Extension')->nullable();

            $table->string('Proof_Image')->nullable();
            $table->binary('DB_Proof_Image')->nullable();

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
        Schema::dropIfExists('hotel_reservations');
    }
};
