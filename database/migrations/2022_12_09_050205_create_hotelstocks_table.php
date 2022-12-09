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
            $table->id('productid');
            $table->string('name');
            $table->text('description');
            $table->string('category');

            $table->integer('in');
            $table->integer('out');
            $table->integer('total');

            $table->timestamp('date');
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
        Schema::dropIfExists('hotelstocks');
    }
};
