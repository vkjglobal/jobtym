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
        Schema::create('matched_jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('employer_id');
            $table->unsignedBigInteger('job_posts_id');
            $table->boolean('status')->default(1)->comment('0-InActive, 1-Active');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('employer_id')->references('id')->on('employers');
            $table->foreign('job_posts_id')->references('id')->on('job_posts');
        });



      
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matched_jobs');
    }
};
