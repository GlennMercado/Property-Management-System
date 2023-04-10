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
        Schema::create('hotel_room_supplies_reports', function (Blueprint $table) {
            $table->id();
            
            $table->integer('Room_No');

            $table->integer('productid');
            
            $table->string('name');
            
            $table->string('Category');

            $table->integer('Quantity');

            $table->integer('Price');
                
            $table->integer('Quantity_Requested')->default(0);

            $table->string('Attendant');
            $table->string('Status');

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
        Schema::dropIfExists('hotel_room_supplies_reports');
    }
};
