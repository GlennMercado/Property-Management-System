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
        Schema::create('guestticket', function (Blueprint $table) {
            $table->increments('ID');
            $table->string('Name');
            $table->string('Email');
            $table->string('Category');
            $table->string('Subject');
            $table->string('Description');
            $table->string('Image');
            
            $table->binary('DB_Image');
            //$table->binary('DB_Image');
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
        Schema::dropIfExists('guestticket');
    }
};
