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
        Schema::create('lost_and_founds', function (Blueprint $table) {
            $table->id();

            $table->string('Facility_Type');
            $table->string('Room_No')->nullable();
            $table->string('Item');
            $table->string('Item_Description');
            $table->string('Found_By');
            $table->date('Date_Found')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->date('Date_Claimed')->nullable();
            $table->string('Claimed_By')->nullable();
            $table->string('Status')->default('Ongoing');
            $table->boolean('IsArchived')->default(false);

            $table->string('Item_Image')->nullable();

            $table->binary('DB_Image')->nullable();
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
        Schema::dropIfExists('lost_and_founds');
    }
};
