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
        Schema::create('guest_folio', function (Blueprint $table) {
            $table->id();

            $table->string('Booking_No');
            $table->index('Booking_No');
            $table->foreign('Booking_No')->references('Booking_No')->on('hotel_reservations')->onDelete('cascade')->onUpdate('cascade');

            $table->string('Description');

            $table->string('Price');

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
        Schema::dropIfExists('guest_folio');
    }
};
