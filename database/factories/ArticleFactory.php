<?php

use Faker\Generator as Faker;
use App\Article;

$factory->define(App\Article::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->realText($maxNbChars = 50),
        'price'=>$faker->randomFloat(2,0,500),
        'category_id'=>$faker->numberBetween($min = 1, $max = 10),
        'remember_token'=>str_random(40),
    ];
});
