<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('likes')->delete();

        $likes = [
            [
                'user_id' => 1,
                'project_id' => 1,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],
            [
                'user_id' => 2,
                'project_id' => 1,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],
            [
                'user_id' => 3,
                'project_id' => 1,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],
            [
                'user_id' => 2,
                'project_id' => 2,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],
            [
                'user_id' => 3,
                'project_id' => 2,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],
            [
                'user_id' => 3,
                'project_id' => 3,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],
        ];

        DB::table('likes')->insert($likes);
    }
}