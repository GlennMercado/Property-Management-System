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
        Schema::create('purchasereport', function (Blueprint $table) {
            $table->id('productid');
            $table->string('productcode');
            $table->string('name');
            $table->string('suppliername');
            $table->text('description');

            $table->integer('unit');
            $table->integer('quantity');

            $table->timestamp('date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purchasereport');
    }
};
