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
        Schema::create('hotel_room_linens', function (Blueprint $table) {
            $table->id();
            
            $table->integer('Room_No');
            $table->index('Room_No');
            $table->foreign('Room_No')->references('Room_No')->on('novadeci_suites')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('productid');
            $table->index('productid');
            $table->foreign('productid')->references('productid')->on('hotelstocks')->onDelete('cascade')->onUpdate('cascade');

            $table->string('name');
            $table->index('name');
            $table->foreign('name')->references('name')->on('hotelstocks')->onDelete('cascade')->onUpdate('cascade');

            $table->string('Category');

            $table->integer('Quantity');

            $table->integer('Discrepancy')->default(0);
                
            $table->integer('Quantity_Requested')->nullable();

            $table->string('Attendant')->default('Unassigned');
            $table->string('Status')->default('Received');
            $table->text('Remarks')->nullable();

            $table->datetime('Date_Requested')->nullable();
            $table->datetime('Date_Received')->nullable();

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
        Schema::dropIfExists('hotel_room_linens');
    }
};
