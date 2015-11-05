<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt('testtest'),
        'remember_token' => str_random(10),
        'societe' => str_random(100),
        'rc' => str_random(50),
        'tel' => str_random(10),
        'gender' => 'F',
        'rue' => '',
        'ville' => '',
        'pays' => '',
        'a_propos' => '',
        'logo' => 'nologo.png',
    ];
});
