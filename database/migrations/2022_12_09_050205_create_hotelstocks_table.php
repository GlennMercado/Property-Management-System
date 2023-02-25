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
        Schema::create('hotelstocks', function (Blueprint $table) {
            $table->increments('productid');
            //$table->integer('productid)->primary();
            $table->string('name');
            $table->unique('name');
            $table->text('description');
            $table->string('category');

            $table->integer('total');
            $table->integer('Stock_Level');
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *c
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotelstocks');
    }
};
