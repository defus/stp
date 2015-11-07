<?php

use Illuminate\Database\Seeder;

class ChargementTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('chargements')->insert([
            ['statut' => 'O', 'owner_id' => "1",],
            ['statut' => 'O', 'owner_id' => "3",],
            ['statut' => 'O', 'owner_id' => "3",],
            ['statut' => 'A', 'owner_id' => "3",],
        ]);

    }
}
