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
        Schema::create('finance_reports', function (Blueprint $table) {
            $table->id('userid');
            $table->integer('ornum');
            $table->string('payee');
            $table->string('particular');
            $table->string('debit');
            $table->string('remark');

            $table->integer('amount');
            $table->cash('amount');
            $table->unearned('amount');
            $table->bank('amount');
            $table->cheque('amount');
            $table->integer('amount');
            $table->integer('amount');
            $table->integer('amount');
            $table->integer('amount');


            
            
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
        Schema::dropIfExists('finance_reports');
    }
};
