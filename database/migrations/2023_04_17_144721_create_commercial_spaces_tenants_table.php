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
        Schema::create('commercial_spaces_tenants', function (Blueprint $table) {
            $table->id();
            
            $table->integer('Tenant_ID');
            $table->index('Tenant_ID');
            $table->foreign('Tenant_ID')->references('id')->on('commercial_spaces_applications')->onDelete('cascade')->onUpdate('cascade');

            $table->string('Authorized_Personnel');
            $table->string('Space_Unit');
            $table->integer('Rental_Fee');
            $table->date('Due_Date');

            $table->date('Start_Date');
            $table->date('End_Date');

            $table->string('Tenant_Status')->default('Active (Operating)');

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
        Schema::dropIfExists('commercial_spaces_tenants');
    }
};
