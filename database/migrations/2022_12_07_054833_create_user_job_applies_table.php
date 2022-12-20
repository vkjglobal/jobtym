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
        Schema::create('user_job_applies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id');;
            $table->unsignedBigInteger('user_id');
            $table->string('job_title');
            $table->string('employer');
            $table->enum('shortlist',['yes','no'])->nullable();
            $table->enum('attend_interview',['yes','no'])->nullable();
            $table->enum('apptitude',['high','low','medium'])->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('current_job')->nullable();
            $table->string('current_salary')->nullable();
            $table->string('academic');
            $table->string('age');
            $table->string('salary')->nullable();
            $table->enum('gender',['male','female','other']);
            $table->string('industry');
            $table->string('resumeUpload');
            $table->string('file')->nullable();
            $table->timestamps();
            $table->foreign('job_id')->references('id')->on('job_posts');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_job_applies');
    }
};
