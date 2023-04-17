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
        Schema::create('commercial_spaces_applications', function (Blueprint $table) {
            $table->id();

            $table->string('email');
            $table->index('email');
            $table->foreign('email')->references('email')->on('users'); 

            $table->string('Status')->default('For Approval');

            $table->string('business_name');
            $table->string('business_style');
            $table->string('business_address');
            $table->string('email_website_fb');
            $table->string('business_landline_no');
            $table->string('business_mobile_no');
            $table->string('name_of_owner');
            $table->string('spouse');
            $table->string('home_address');
            $table->string('landline');
            $table->string('mobile_no');
            $table->string('tax_identification_no');
            $table->string('tax_cert_valid_gov_id');
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
        Schema::dropIfExists('commercial_spaces_application');
    }
};
