<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('google_id')->unique()->nullable();
            $table->string('User_Type')->default('Guest');
            $table->boolean('IsDisabled')->default(false);
            $table->boolean('IsArchived')->default(false);
            $table->string('profile_pic');
            $table->string('email_verification_token')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'Daniel Diapen',
                'email' => 'inter.sol@gmail.com',
                'password' => Hash::make('A4rglujuforvih19'),
                'User_Type' => 'Admin',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
