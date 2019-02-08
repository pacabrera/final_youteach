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
            $table->integer('usr_id');
            $table->foreign('usr_id')->references('id')->on('users');
            $cs = $table->string('class_id', 5);
$cs->collation = 'utf8mb4_bin';
            $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('cascade');
            $table->string('video')->nullable();
            $table->unsignedInteger('assign_id')->nullable();
            $table->foreign('assign_id')->references('id')->on('assignments')->onDelete('cascade');
            $table->unsignedInteger('quiz_id')->nullable();
            $table->foreign('quiz_id')->references('quiz_event_id')->on('quiz_events')->onDelete('cascade');
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
