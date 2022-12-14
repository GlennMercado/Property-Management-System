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
            $table->integer('guest_id')->primary();
            $table->string('name');
            $table->string('email');
            $table->string('category');
            $table->string('subject');
            $table->string('description');
            $table->string('guest_image');
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
