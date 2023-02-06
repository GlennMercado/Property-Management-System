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
        Schema::create('housekeepings', function (Blueprint $table) {
            $table->increments('ID');

            $table->integer('Room_No');
            $table->index('Room_No');
            $table->foreign('Room_No')->references('Room_No')->on('novadeci_suites')->onDelete('cascade')->onUpdate('cascade');
                       
            $table->string('Housekeeping_Status')->default('Cleaned');
            $table->string('Room_Attendant')->default('Unassigned');
            $table->date('Date_Time_Accomplished')->nullable();

            $table->timestamps();

            /*$table->foreign('Room_No')
            ->references('Room_No')
            ->on('novadeci_suites')
            ->onUpdate('Cascade')
            ->onDelete('Cascade');*/


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('housekeepings');
    }
};
