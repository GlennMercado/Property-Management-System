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
        Schema::create('key_management', function (Blueprint $table) {
            $table->id();

            $table->string('Key_ID');
            $table->index('Key_ID');
            $table->foreign('Key_ID')->references('Key_ID')->on('novadeci_suites')->onDelete('cascade')->onUpdate('cascade');
            
            $table->integer('Room_No');

            $table->string('Booking_No');
            $table->index('Booking_No');
            $table->foreign('Booking_No')->references('Booking_No')->on('hotel_reservations')->onDelete('cascade')->onUpdate('cascade');
                    
            $table->string('Attendant');

            //basta hawak ng attendant
            $table->string('Status')->default('Issued');

            $table->datetime('Due_Time');

            $table->datetime('Returned_Time')->nullable();

            $table->boolean('IsArchived')->default(false);

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
        Schema::dropIfExists('key__management');
    }
};
