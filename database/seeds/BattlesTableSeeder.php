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
                'battle_theme' => 'Christmas',
                'battle_active' => "1",
            ],            [
                'battle_theme' => 'Coffee',
                'battle_active' => "0",
            ],
        ];

        DB::table('battles')->insert($battles);
    }
}
