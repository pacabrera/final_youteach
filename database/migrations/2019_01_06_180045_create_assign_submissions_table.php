<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignSubmissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_submissions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('assgn_id');
            $table->unsignedInteger('usr_id');
            $table->foreign('usr_id')->references('id')->on('users');
            $table->foreign('assgn_id')->references('id')->on('assignments')->onDelete('cascade');
            $table->string('response');
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
        Schema::dropIfExists('assign_submissions');
    }
}
