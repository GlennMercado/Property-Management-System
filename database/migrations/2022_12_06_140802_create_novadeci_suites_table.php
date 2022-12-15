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
        Schema::create('novadeci_suites', function (Blueprint $table) {
            
            $table->integer('Room_No')->primary();
            $table->String('Room_Size');
            $table->String('No_of_Beds');
            $table->string('Extra_Bed');
            $table->integer('No_Pax_Per_Room');
            $table->string('Status')->default('Available');
            $table->integer('Rate_per_Night');
            $table->string('Membership');
            $table->string('Hotel_Image');

            $table->binary('DB_Image');
            //$table->binary('DB_Image');
            $table->timestamps();
            //4 State (Cleaned, Dirty, Out of Order, Out of Service)
                        
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novadeci_suites');
    }
};
