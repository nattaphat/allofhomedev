<?php

use Illuminate\Database\Seeder;
use App\User;
// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $users =[
            [
                'username'  => 'superadmin',
                "password"  => bcrypt('password'),
                "role" => 1,
                "firstname" => 'Superadmin',
                "lastname" => 'Allofhome',
                "email" => 'allofhome@gmail.com',
                "signup_type" => 'regular'
            ]
        ];

        DB::table('users')->delete();
        foreach ($users as $user){
            User::create($user);
        }
    }
}
