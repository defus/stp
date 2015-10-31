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
            'name' => 'Compte de test',
            'email' => 'test@test.com',
            'password' => bcrypt('testtest'),
            'societe' => 'LIMC',
            'rc' => '23980',
            'tel' => '00212876564',
            'gender' => 'F'
        ]);
    }
}
