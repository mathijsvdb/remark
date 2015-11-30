<?php

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
                'img' => 'assets/images/200x150.png'
            ],
            [
                'title' => 'test&',
                'description' => "Lorem ipsum dolerium sa monty",
                'url' => "http://remark.dev",
                'img' => 'assets/images/200x150.png'
            ],
            [
                'title' => 'test2',
                'description' => "Lorem ipsum dolerium sa monty",
                'url' => "http://remark.dev",
                'img' => 'assets/images/200x150.png'
            ],
            [
                'title' => 'test3',
                'description' => "Lorem ipsum dolerium sa monty",
                'url' => "http://remark.dev",
                'img' => 'assets/images/200x150.png'
            ],
            [
                'title' => 'test4',
                'description' => "Lorem ipsum dolerium sa monty",
                'url' => "http://remark.dev",
                'img' => 'assets/images/200x150.png'
            ],
        ];

        DB::table('ads')->insert($adver);
    }
}