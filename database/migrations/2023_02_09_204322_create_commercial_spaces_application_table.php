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
            $table->integer('id')->autoIncrement();

            $table->string('email');
            $table->index('email');
            $table->foreign('email')->references('email')->on('users'); 

            $table->string('Status')->default('For Approval');

            $table->string('business_name');
            $table->string('business_style');
            $table->string('business_address');
            $table->string('email_website_fb');
            $table->string('business_landline_no')->nullable();
            $table->string('business_mobile_no');
            //$table->string('authorized_representative');
            $table->string('name_of_owner');
            $table->string('spouse')->nullable();
            $table->string('home_address');
            $table->string('landline')->nullable();
            $table->string('mobile_no');
            $table->string('tax_identification_no');
            $table->string('tax_cert_valid_gov_id');

            $table->date("Interview_Date")->nullable();

            $table->string('Remarks')->nullable();

            $table->boolean('IsArchived')->default(false);
            
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
