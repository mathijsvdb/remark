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
                'username' => 'Jorre20',
                'password' => Hash::make('joris'),
                'email' => 'joris20@student.thomasmore.be',
                'accountstatus' => '1',
                'image' => 'default.jpg'
            ],
            [
                'firstname' => 'Robby',
                'lastname' => 'Vanelderen',
                'username' => 'MustacheMan',
                'password' => Hash::make('robby'),
                'accountstatus' => '1',
                'email' => 'robby20@student.thomasmore.be',
                'image' => 'default.jpg'
            ],
            [
                'firstname' => 'David',
                'lastname' => 'Heerinckx',
                'username' => 'ViKING',
                'password' => Hash::make('david'),
                'accountstatus' => '1',
                'email' => 'david20@student.thomasmore.be',
                'image' => 'default.jpg'
            ],
        ];

        DB::table('users')->insert($users);
    }
}
