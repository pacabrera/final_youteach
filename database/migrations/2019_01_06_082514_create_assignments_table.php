<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('body');
            $table->dateTime('deadline');
            $table->integer('usr_id');
            $table->foreign('usr_id')->references('id')->on('users');
            $cs = $table->string('class_id', 5);
$cs->collation = 'utf8mb4_bin';
            $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('cascade');
            $table->smallInteger('status');
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
        Schema::dropIfExists('assignments');
    }
}
