<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 20, $max = 1000),
        'detail' => $faker->paragraph(3),
        'photo_size' => rand(4,1).':1',
        'cate_id'=>rand(1,10)
    ];
});
