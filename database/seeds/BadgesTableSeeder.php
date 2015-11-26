<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BadgesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badges')->delete();

        $badges = [
            [
                'badge_title' => 'First timer',
                'badge_description' => "You've feedback within 2 hours of registration.",
                'badge_img' => 'badges_0.png'
            ],
            [
                'badge_title' => 'Founding member',
                'badge_description' => 'You are one of the first 100 members.',
                'badge_img' => 'badges_1.png'
            ],
            [
                'badge_title' => 'Helping hand',
                'badge_description' => "You've given feedback 5 times on one project.",
                'badge_img' => 'badges_1.png'
            ],
            [
                'badge_title' => 'Look at me!',
                'badge_description' => 'You uploaded your first project.',
                'badge_img' => 'badges_3.png'
            ],
            [
                'badge_title' => "I'm a regular",
                'badge_description' => "You've logged in for 3 consecutive days.",
                'badge_img' => 'badges_4.png'
            ],
        ];

        DB::table('badges')->insert($badges);
    }
}
