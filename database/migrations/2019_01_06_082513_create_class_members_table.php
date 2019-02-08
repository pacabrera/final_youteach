<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClassMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('class_members', function (Blueprint $table) {
                        $cs = $table->string('class_id', 5);
            $cs->collation = 'utf8mb4_bin';
            $table->integer('student_id');  //student ID comes from users table
            $table->string('isCalled', 1)->default(0);
            $table->timestamps();
        });

        Schema::table('class_members', function(Blueprint $table){
            $table->foreign('student_id')->references('id')->on('users');
            $table->foreign('class_id')->references('class_id')->on('classes')->onDelete('cascade');;
        });

}
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('class_members');
    }
}
