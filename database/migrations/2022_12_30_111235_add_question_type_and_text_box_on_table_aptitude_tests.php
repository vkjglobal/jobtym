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
        Schema::table('aptitude_tests', function (Blueprint $table) {
            $table->string('question_type')->after('job_id')->nullable();
            $table->string('text_box')->after('question')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('aptitude_tests', function (Blueprint $table) {
            $table->dropColumn('question_type');
            $table->dropColumn('text_box');
        });
    }
};
