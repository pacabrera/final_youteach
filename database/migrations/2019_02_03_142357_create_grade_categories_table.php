<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('class_id', 5);
            $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('cascade');;;
            $table->string('type');
            $table->integer('hps')->nullable();
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
        Schema::dropIfExists('grade_categories');
    }
}
