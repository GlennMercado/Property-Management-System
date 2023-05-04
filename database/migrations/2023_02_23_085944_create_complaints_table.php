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
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('profile_pic');
            $table->string('concern');
            $table->string('concern_text');
            $table->string('status');
            $table->string('remarks');
            $table->date('schedule');
            $table->timestamps();
            $table->string('complaints_img');
            $table->binary('DB_Image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
};
