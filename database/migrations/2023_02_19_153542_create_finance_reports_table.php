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
            $table->integer('or');
            $table->string('payee');
            $table->string('particular');
            $table->string('debit');
            $table->string('remark');

            $table->integer('amount');
            
            
            $table->timestamps('dateadded');
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
