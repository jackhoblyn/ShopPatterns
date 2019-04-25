<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'manufacturer' => $faker->randomElement(['apple', 'samsung', 'microsoft', 'lenovo', 'amazon', 'dell', 'toshiba', 'sony']),
        'category' => $faker->randomElement(['laptop', 'phone', 'accessory', 'audio', 'visual', 'desktop']),
        'image' => $faker->randomElement(['laptop.jpg', 'laptop2.jpg', 'phone.jpg', 'phone2.jpg', 'case.jpg', 'case2.jpg', 'charger.jpg', 'charger2.jpg', 'monitor.jpg', 'monitor2.jpg', 'headphones.jpg', 'default.jpg']),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99.00),
        'description' => $faker->text($maxNbChars = 140),
        'stock' => $faker->randomDigitNotNull
    ];
});



// 'image' => $faker->image('public/images',400,300,null,false),