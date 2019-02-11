<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_scores', function (Blueprint $table) {
            $table->integer('student_id');
            $table->integer('score');
            $table->timestamp('recorded_on');
            $table->foreign('student_id')->references('id')->on('users');
            $table->unsignedInteger('assign_id');
            $table->foreign('assign_id')->references('id')->on('assignments')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_scores');
    }
}
