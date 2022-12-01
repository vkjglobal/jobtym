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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('gender',['male','female','other']);
            $table->string('date_of_birth');
            $table->string('phone');
            $table->string('secondary_phone')->nullable();
            $table->string('country');
            $table->enum('isResident', ['yes', 'no']);
            $table->string('street');
            $table->string('city');
            $table->string('town');
            $table->string('division');
            $table->string('postal_address');
            $table->string('tin')->nullable();
            $table->string('vaccination_ref_number')->nullable();
            $table->boolean('status')->default(1)->comment('0-Inactive, 1-Active');
            $table->string('image')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
