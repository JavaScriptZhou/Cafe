<?php

use Faker\Generator as Faker;

$factory->define(App\Cate::class, function (Faker $faker) {

    $photo_arr = array("img01.jpg","img02.jpg","img03.jpg");
    return [

        'name' => $faker->name,
        "photo"=>$photo_arr[rand(0,2)],
        "des"=>$faker->sentence(6)
        //
    ];
});
