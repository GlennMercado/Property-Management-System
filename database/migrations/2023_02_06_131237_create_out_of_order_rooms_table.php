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

            $table->integer('Room_No');
            $table->index('Room_No');
            $table->foreign('Room_No')->references('Room_No')->on('novadeci_suites')->onDelete('cascade')->onUpdate('cascade');
            $table->string('Description');   
            $table->string('Created_By');
            $table->string('Priority_Level');
            $table->string('Status')->default('Ongoing');
            $table->string('Resolved_By')->nullable();
            $table->timestamp('Date_Created')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('Due_Date');
            $table->date('Date_Resolved')->nullable();
            
            //$table->timestamps();
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
