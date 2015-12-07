<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
            [
                'name' => 'Coffee Battle',
                'theme' => 'Coffee',
                'description' => 'Design a logo for a coffee brand.',
                'active' => false,
                'start_date' => Carbon::now()->addMonth(-2),
                'end_date' => Carbon::now()->addDay(-1)
            ],
        ];

        DB::table('battles')->insert($battles);
    }
}
