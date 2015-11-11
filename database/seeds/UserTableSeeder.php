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
            'name' => "Atik TAZI",
            'email' => 'test@test.com',
            'password' => bcrypt('testtest'),
            'societe' => 'LIMC',
            'rc' => '23980',
            'tel' => '00212876564',
            'c_type' => 'O',
            'rue' => 'kitoko',
            'ville' => 'Rabat',
            'pays' => 'Maroc',
            'a_propos' => 'Maz',
            'logo' => 'nologo.jpg',
        ]);
        
        //Transporteur CTM
        DB::table('users')->insert([
            'name' => "Chahid Charaoui",
            'email' => 'c.charaoui@ctm.ma',
            'password' => bcrypt('charaoui'),
            'societe' => 'CTM',
            'rc' => '23980',
            'tel' => '00212876564',
            'c_type' => 'T',
            'rue' => '23 agdal',
            'ville' => 'Rabat',
            'pays' => 'Maroc',
            'a_propos' => "Transporteur dans tout le Maroc et à l'international",
            'logo' => '2/logo.jpg',
        ]);
        
        //Donneur d'ordre'
        DB::table('users')->insert([
            'name' => "Hamid Mostapha",
            'email' => 'h.mostapha@filer.com',
            'password' => bcrypt('hamid'),
            'societe' => 'FILER',
            'rc' => '2393400',
            'tel' => '00212876534',
            'c_type' => 'O',
            'rue' => '24 Taroudan',
            'ville' => 'Agadir',
            'pays' => 'Maroc',
            'a_propos' => "Société de production de fils alimentaire",
            'logo' => '3/logo.jpg',
        ]);
        
        
    }
}
