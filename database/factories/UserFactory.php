<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {

    $gender = ['m','w'];

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'sex'=>$gender[rand(0,1)],
        'auth'=>rand(0,3),
        'phone'=>rand(10000000000,19999999999),
        'status'=> rand(0,1),
        'password' => '1234', // secret
        'remember_token' => str_random(10),
    ];
});
