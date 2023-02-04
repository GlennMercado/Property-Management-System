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
            $table->string('Reservation_No')->primary();
            $table->string('Guest_Name');
            $table->string('Mobile_Num');
            $table->string('Email')->nullable();
            
            $table->integer('Room_No');
            $table->integer('No_of_Pax');

            $table->string('Payment_Status')->default('Pending');
            $table->string('Booking_Status')->nullable();
            $table->boolean('Isvalid')->default(True);

            $table->string('Proof_Image')->nullable();
            $table->binary('DB_Proof_Image')->nullable();

            $table->string('Check_In_Date');
            $table->string('Check_Out_Date');

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
