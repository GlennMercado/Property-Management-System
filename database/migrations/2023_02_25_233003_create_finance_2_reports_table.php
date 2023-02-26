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
        Schema::create('finance_2_reports', function (Blueprint $table) {
            $table->id('userid');
            $table->integer('ornum');
            $table->string('payee');
            $table->string('particular');
            $table->string('debit');
            $table->string('remark');
            $table->integer('amount');
            $table->string('eventdate');

            $table->integer('cash');
            $table->integer('unearned');
            $table->integer('bank');
            $table->integer('cheque');

            $table->integer('basketball');
            $table->integer('otherincome');
            $table->integer('parking');
            $table->integer('managementfee');
            $table->integer('event');
            $table->integer('hotel');
            $table->integer('commercialspace');
            $table->integer('outputvat');


            
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
        Schema::dropIfExists('finance_2_reports');
    }
};
