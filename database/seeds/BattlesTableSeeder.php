<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BattlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('battles')->delete();

        $battles = [
            [
                'name' => 'Christmas Battle',
                'theme' => 'Christmas',
                'description' => 'Make a Christmas themed artwork.',
                'active' => true,
            ],
            [
                'name' => 'Coffee Battle',
                'theme' => 'Coffee',
                'description' => 'Design a logo for a coffee brand.',
                'active' => false,
            ],
        ];

        DB::table('battles')->insert($battles);
    }
}
