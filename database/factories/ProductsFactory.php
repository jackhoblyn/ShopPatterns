<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'manufacturer' => $faker->lastName,
        'category' => $faker->word,
        'image' => $faker->word,
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99.00),
        'stock' => $faker->randomDigitNotNull
    ];
});
