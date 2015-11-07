<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(ChargementTableSeeder::class);

        Model::reguard();
    }
}
