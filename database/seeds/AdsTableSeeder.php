<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->delete();

        $adver = [
            [
                'title' => 'test',
                'description' => "Lorem ipsum dolerium sa monty",
                'url' => "http://remark.dev",
                'img' => 'assets/images/200x150.png',
                'user_id' => 1,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
            [
                'title' => 'test&',
                'description' => "Lorem ipsum dolerium sa monty",
                'url' => "http://remark.dev",
                'img' => 'assets/images/200x150.png',
                'user_id' => 1,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
            [
                'title' => 'test2',
                'description' => "Lorem ipsum dolerium sa monty",
                'url' => "http://remark.dev",
                'img' => 'assets/images/200x150.png',
                'user_id' => 2,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
            [
                'title' => 'test3',
                'description' => "Lorem ipsum dolerium sa monty",
                'url' => "http://remark.dev",
                'img' => 'assets/images/200x150.png',
                'user_id' => 1,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
            [
                'title' => 'test4',
                'description' => "Lorem ipsum dolerium sa monty",
                'url' => "http://remark.dev",
                'img' => 'assets/images/200x150.png',
                'user_id' => 1,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
        ];

        DB::table('ads')->insert($adver);
    }
}