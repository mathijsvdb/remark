<?php

use Illuminate\Database\Seeder;

class WaitlistTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waitlist')->delete();

        $waitlist = [
            [
                'firstname' => 'test',
                'lastname' => 'test',
                'email' => 'test@student.thomasmore.be',
            ],
            [
                'firstname' => 'test1',
                'lastname' => 'test1',
                'email' => 'test1@student.thomasmore.be',
            ],
            [
                'firstname' => 'test2',
                'lastname' => 'test2',
                'email' => 'test2@student.thomasmore.be',
            ],
        ];

        DB::table('waitlist')->insert($waitlist);
    }
}
