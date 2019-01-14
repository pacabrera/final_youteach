<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\UserProfile;
class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('user_profiles', function (Blueprint $table) {
            $table->integer('id');
            $table->string('given_name');
            $table->string('family_name');
            $table->string('middle_name');
            $table->string('ext_name')->nullable();
            $table->string('gender');
            $table->timestamps();
            $table->string('profile_pic');
        });
        Schema::table('user_profiles', function(Blueprint $table){
            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });

        UserProfile::create([
            'id' => 100,
            'given_name' => 'Admin',
            'family_name' => 'Admin',
            'middle_name' => 'Admin',
            'gender' => 'Male',
            'profile_pic' => 'no-profile.png',
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_profiles');
    }
}
