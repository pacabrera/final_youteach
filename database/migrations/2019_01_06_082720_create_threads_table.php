<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('usr_id');
            $table->foreign('usr_id')->references('id')->on('users');
            $table->string('class_id', 5);
            $table->foreign('class_id')->references('class_id')->on('classes');
            $table->unsignedInteger('assign_id')->nullable();
            $table->foreign('assign_id')->references('id')->on('assignments')->onDelete('cascade');
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
        Schema::dropIfExists('threads');
    }
}
