<?php

use Illuminate\Database\Seeder;

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

        $adver = [
            [
                'title' => 'Mugs',
                'body' => "Mugs Coffee Brand",
                'tags' => "logo",
                'img' => 'assets/images/projects/coffee_logo_1.png',
                'img_tricolor' => "FCCC66,6EC4C1,17506E",
                'user_id' => 1,
                'battle_id' => 2,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],[
                'title' => 'Mugs',
                'body' => "Mugs Coffee Brand",
                'tags' => "logo",
                'img' => 'assets/images/projects/coffee_logo_2.png',
                'img_tricolor' => "FCCC66,6EC4C1,17506E",
                'user_id' => 2,
                'battle_id' => 2,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ],
            [
                'title' => 'Mugs',
                'body' => "Mugs Coffee Brand",
                'tags' => "logo",
                'img' => 'assets/images/projects/coffee_logo_3.png',
                'img_tricolor' => "FCCC66,6EC4C1,17506E",
                'user_id' => 3,
                'battle_id' => 2,
                'created_at' => Carbon::now()->addMonth(-1),
                'updated_at' => Carbon::now()->addMonth(-1)
            ]
        ];
    }
}
