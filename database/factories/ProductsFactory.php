<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'manufacturer' => $faker->randomElement(['apple', 'samsung', 'microsoft', 'lenovo', 'amazon', 'dell', 'toshiba', 'sony']),
        'category' => $faker->randomElement(['laptop', 'phone', 'accessory', 'audio', 'visual', 'desktop']),
        'image' => $faker->image('public/images',400,300,null,false),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99.00),
        'stock' => $faker->randomDigitNotNull
    ];
});
