<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Mohammed Bernoussi, utilisateur de test qui permet de valider les fonctionnailité de l'application",
            'email' => 'test@test.com',
            'password' => bcrypt('testtest'),
            'societe' => 'LIMC',
            'rc' => '23980',
            'tel' => '00212876564',
            'gender' => 'F',
            'rue' => 'kitoko',
            'ville' => 'Rabat',
            'pays' => 'Maroc',
            'a_propos' => 'Maz',
            'logo' => 'nologo.jpg',
        ]);
    }
}
