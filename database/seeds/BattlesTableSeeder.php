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
                'battle_name' => 'Christmas Battle',
                'battle_theme' => 'Christmas',
                'battle_active' => true,
            ],
            [
                'battle_name' => 'Coffee Battle',
                'battle_theme' => 'Coffee',
                'battle_active' => false,
            ],
        ];

        DB::table('battles')->insert($battles);
    }
}
