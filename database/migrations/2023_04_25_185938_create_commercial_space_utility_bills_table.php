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
        Schema::create('commercial_space_utility_bills', function (Blueprint $table) {
            $table->id();
            
            $table->integer('Tenant_ID');
            $table->index('Tenant_ID');
            $table->foreign('Tenant_ID')->references('id')->on('commercial_spaces_applications')->onDelete('cascade')->onUpdate('cascade');

            $table->string('Type_of_Bill');
            $table->integer('Total_Amount');

            $table->date('Due_Date')->nullable();
            $table->date('Paid_Date')->nullable();

            $table->string('Payment_Status')->nullable();

            $table->string('Reference_No')->nullable();
            $table->string('Proof_Image')->nullable();

            // $table->binary('DB_Proof_Image')->nullable();

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
        Schema::dropIfExists('commercial_space_utility_bills');
    }
};
