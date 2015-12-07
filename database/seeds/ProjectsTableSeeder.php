<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->delete();

        $projects = [
            [
                'title' => 'Mugs',
                'body' => "Mugs Coffee Brand.",
                'tags' => "logo",
                'img' => 'projects/coffee_logo_1.jpg',
                'img_tricolor' => "FCCC66,6EC4C1,17506E",
                'user_id' => 1,
                'battle_id' => 2,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],[
                'title' => 'Pointas',
                'body' => "Pointas logo Spanish Coffee.",
                'tags' => "logo",
                'img' => 'projects/coffee_logo_2.png',
                'img_tricolor' => "FCCC66,6EC4C1,17506E",
                'user_id' => 2,
                'battle_id' => 2,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],
            [
                'title' => 'Xpresso',
                'body' => "All aboard the xpresso.",
                'tags' => "logo",
                'img' => 'projects/coffee_logo_3.jpg',
                'img_tricolor' => "FCCC66,6EC4C1,17506E",
                'user_id' => 3,
                'battle_id' => 2,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ]
        ];

        DB::table('projects')->insert($projects);
    }
}
