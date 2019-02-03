<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('password');
            $table->integer('permissions');
            $table->string('email');
            $table->rememberToken();
            $table->timestamps();
        });

        User::create([
            'id' => '100',
            'email' => 'youteach@youteachlms.com',
            'permissions' => 0,
            'password' => Hash::make("password"),
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
