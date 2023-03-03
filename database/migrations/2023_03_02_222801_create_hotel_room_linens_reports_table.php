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
        Schema::create('hotel_room_linens_reports', function (Blueprint $table) {
            $table->id();
            
            $table->integer('Room_No');
            
            $table->integer('productid');
            
            $table->string('name');
            
            $table->string('Category');

            $table->integer('Quantity');

            $table->integer('Discrepancy');
                
            $table->integer('Quantity_Requested');

            $table->string('Attendant');
            $table->string('Status');
            $table->text('Remarks');

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
        Schema::dropIfExists('hotel_room_linens_reports');
    }
};
