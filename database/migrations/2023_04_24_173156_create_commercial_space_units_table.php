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
        Schema::create('commercial_space_units', function (Blueprint $table) {
            $table->string('Space_Unit')->primary();
            $table->integer('Measurement_Size');
            $table->string('Maintenance_Status')->default('No');
            $table->string('Occupancy_Status')->default('Vacant');
            $table->integer('Rental_Fee');

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
        Schema::dropIfExists('commercial_space_units');
    }
};
