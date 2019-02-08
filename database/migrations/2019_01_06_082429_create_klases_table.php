<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classes', function (Blueprint $table) {

            $cs = $table->string('class_id', 5);
            $cs->collation = 'utf8mb4_bin';
            $table->integer('instructor_id');   //instructor_id comes from users table
            $table->integer('subject_id')->unsigned();
            $table->boolean('class_active');
            $table->primary('class_id');
            $table->string('class_name');
            $table->integer('section_id')->unsigned(); 
            $table->timestamps();
        });
        Schema::table('classes', function(Blueprint $table){
            $table->foreign('instructor_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('subject_id')->references('subject_id')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klases');
    }
}
