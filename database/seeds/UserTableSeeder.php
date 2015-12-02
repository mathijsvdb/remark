<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $users = [
            [
                'firstname' => 'Joris',
                'lastname' => 'Hens',
                'username' => 'Jorre',
                'password' => Hash::make('joris'),
                'email' => 'joris@student.thomasmore.be',
                'image' => 'default.jpg'
            ],
            [
                'firstname' => 'Robby',
                'lastname' => 'Vanelderen',
                'username' => 'MustacheMan',
                'password' => Hash::make('robby'),
                'email' => 'robby@student.thomasmore.be',
                'image' => 'default.jpg'
            ],
            [
                'firstname' => 'David',
                'lastname' => 'Heerinckx',
                'username' => 'ViKING',
                'password' => Hash::make('david'),
                'email' => 'david@student.thomasmore.be',
                'image' => 'default.jpg'
            ],
        ];

        DB::table('users')->insert($users);
    }
}
