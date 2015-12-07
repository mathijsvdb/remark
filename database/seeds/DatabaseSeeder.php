<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        //$this->call(WaitlistTableSeeder::class);
        $this->call(BadgesTableSeeder::class);
        $this->call(UserbadgesTableSeeder::class);
        $this->call(BattlesTableSeeder::class);
        $this->call(ProjectsTableSeeder::class);
        $this->call(AdsTableSeeder::class);

        Model::reguard();
    }
}
