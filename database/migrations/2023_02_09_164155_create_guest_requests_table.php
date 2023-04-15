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
        Schema::create('guest_requests', function (Blueprint $table) {
            $table->string('Request_ID')->primary();
            
            $table->integer('Room_No');
            $table->index('Room_No');
            $table->foreign('Room_No')->references('Room_No')->on('novadeci_suites')->onDelete('cascade')->onUpdate('cascade');

            $table->string('Booking_No');
            $table->index('Booking_No');
            $table->foreign('Booking_No')->references('Booking_No')->on('hotel_reservations')->onDelete('cascade')->onUpdate('cascade');         

            $table->string('Guest_Name');
            $table->date('Date_Requested')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('Date_Updated')->nullable();

            $table->string("Type_of_Request");
            $table->string('Request');

            $table->integer("Quantity")->nullable();
            
            $table->string('Status')->default('Ongoing');
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
        Schema::dropIfExists('guest_requests');
    }
};
