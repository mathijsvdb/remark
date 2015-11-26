<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserbadgesTableSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('userbadges')->delete();

        $userbadges = [
            [
                'user_id' => '1',
                'badge_id' => '1',
            ],
            [
                'user_id' => '1',
                'badge_id' => '2',
            ],
            [
                'user_id' => '1',
                'badge_id' => '3',
            ],

        ];

        DB::table('userbadges')->insert($userbadges);
    }
}
