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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("event_name");
            $table->integer("payment");
            $table->time("start_time");
            $table->time("end_time");
            $table->date("start_date");
            $table->date("end_date");
            $table->string("event_type");
            $table->string("facility");
            $table->string("client_name");
            $table->string("contact_number");
            $table->string("num_of_guest");
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
        Schema::dropIfExists('events');
    }
};
