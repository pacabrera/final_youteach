<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->increments('grade_id');
            $table->integer('grade');
            $table->unsignedInteger('usr_id');
            $table->foreign('usr_id')->references('id')->on('users');
            $table->string('class_id', 5);
            $table->foreign('class_id')->references('class_id')->on('classes');
            $table->unsignedInteger('gradeCategory');
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
        Schema::dropIfExists('grades');
    }
}