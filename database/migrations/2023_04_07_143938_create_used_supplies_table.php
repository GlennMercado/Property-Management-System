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
        Schema::create('used_supplies', function (Blueprint $table) {
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

            $table->integer('Discrepancy')->default(0);

            $table->integer('Price')->default(0);
            
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
        Schema::dropIfExists('used_supplies');
    }
};
