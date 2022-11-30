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
        Schema::create('job_posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employer_id');
            $table->string('title');
            $table->string('industry');
            $table->enum('type', ['fullTime', 'fresher', 'internship', 'contract', 'temporary', 'partTime']);
            $table->text('description');
            $table->string('skills');
            $table->string('country');
            $table->string('residentType');
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('town')->nullable();
            $table->string('division')->nullable();
            $table->string('salaryFrom')->nullable();
            $table->string('salaryTo')->nullable();
            $table->string('email');
            $table->string('schedule_date')->nullable();
            $table->string('deadline');
            $table->string('attachment')->nullable();
            $table->boolean('status')->default(1)->comment('0-InActive, 1-Active');
            $table->timestamps();
            $table->foreign('employer_id')->references('id')->on('employers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_posts');
    }
};
