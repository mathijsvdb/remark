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
                'title' => 'Adobe',
                'description' => "Save 20% on purchases",
                'url' => "http://www.adobe.com/be_nl/creativecloud.html",
                'img' => 'assets/images/reclam/reclam_adobe.png',
                'user_id' => 1,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
            [
                'title' => 'Dribbble',
                'description' => "Remark is stealing our customers!",
                'url' => "http://remark.dev",
                'img' => 'assets/images/reclam/reclam_dribbble.png',
                'user_id' => 1,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
            [
                'title' => 'Razer',
                'description' => "New Anansi Keyboard",
                'url' => "http://remark.dev",
                'img' => 'assets/images/reclam/reclam_razer.png',
                'user_id' => 2,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
            [
                'title' => 'Thomas More',
                'description' => "De hogeschool voor wie meer verwacht",
                'url' => "http://remark.dev",
                'img' => 'assets/images/reclam/reclam_thomasmore.png',
                'user_id' => 1,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
            [
                'title' => 'Beezonder',
                'description' => "Een beezondere blog",
                'url' => "http://www.beezonder.be/",
                'img' => 'assets/images/reclam/reclam_beezonder.png',
                'user_id' => 2,
                'start_date' => carbon::now(),
                'end_date' => Carbon::now()->addMonth(1)
            ],
        ];

        DB::table('ads')->insert($adver);
    }
}