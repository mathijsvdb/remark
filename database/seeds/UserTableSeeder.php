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
                'firstname' => 'test',
                'lastname' => 'test',
                'username' => 'test',
                'password' => Hash::make('test'),
                'email' => 'test@student.thomasmore.be',
                'accountstatus' => '1',
                'image' => 'default.jpg'
            ],
            [
                'firstname' => 'test1',
                'lastname' => 'test1',
                'username' => 'test1',
                'password' => Hash::make('test1'),
                'email' => 'test1@student.thomasmore.be',
                'accountstatus' => '1',
                'image' => 'default.jpg'
            ],
            [
                'firstname' => 'test2',
                'lastname' => 'test2',
                'username' => 'test2',
                'password' => Hash::make('test2'),
                'email' => 'test2@student.thomasmore.be',
                'accountstatus' => '1',
                'image' => 'default.jpg'
            ],
        ];

        DB::table('users')->insert($users);
    }
}
