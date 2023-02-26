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
        Schema::create('convention_center_applications', function (Blueprint $table) {
            $table->id();
            $table->string('inquiry_status');
            $table->string('client_name');
            $table->string('contact_no');
            $table->string('contact_person');
            $table->string('contact_person_no');
            $table->string('billing_address');
            $table->string('email_address');
            $table->string('event_name');
            $table->string('event_type');
            $table->string('event_date');
            $table->string('no_of_guest');
            $table->string('venue');
            $table->string('caterer');
            $table->string('audio_visual');
            $table->string('concept');
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
        Schema::dropIfExists('convention_center_applications');
    }
};
