<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssignSubmissionFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assign_submission_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file');
            $table->timestamps();
            $table->unsignedInteger('submission_id');
            $table->foreign('submission_id')->references('id')->on('assign_submissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_submission_files');
    }
}
