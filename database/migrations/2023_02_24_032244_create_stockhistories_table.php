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
        Schema::create('stockhistories', function (Blueprint $table) {
            $table->id('productid');
            $table->string('name');
            $table->string('category');
            $table->string('Stock_In');
            $table->integer('Stock_Out');
            $table->integer('Quantity');
            $table->integer('Stock');
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
        Schema::dropIfExists('stockhistories');
    }
};
