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
            $table->unsignedBigInteger('job_id')->after('category_id');
            $table->foreign('job_id')->references('id')->on('job_posts');
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
            $table->dropColumn('job_id');
        });
    }
};
