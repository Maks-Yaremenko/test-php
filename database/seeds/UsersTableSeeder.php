<?php

use App\User as User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	//User::truncate(); //will clear DB table users

        User::create([
	        'name' => 'admin',
		    'email' => 'admin@gmail.com',
		    'password' => bcrypt('admin')
	    ]);
    }
}
