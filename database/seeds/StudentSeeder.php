<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('users')->insert([
	            'id' => $faker->numberBetween(20000000,30000000),
	            'permissions' => 2,
	            'password' => bcrypt('password'),
	        ]);

	       	DB::table('user_profiles')->insert([
	            'id' => $faker->numberBetween(20000000,30000000),
	            'given_name' => $faker->firstName('male'|'female'),
	            'middle_name' => 'A',
	            'family_name' => $faker->lastName,
	            'gender' => 'male', 
	            'profile_pic' => 'no-profile.png',
	        ]);

	            Match::create([
        'id' => $home_user_id,
        'away_user_id' => $away_user_id,
    ]);
    }
}
}