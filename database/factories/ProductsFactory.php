<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Model;
use Faker\Generator as Faker;


$factory->defineAs(App\Product::class, 'phone', function (Faker $faker) {
    return [
        'name' => $faker->word,
        'manufacturer' => $faker->randomElement(['apple', 'samsung', 'sony', 'Huawei', 'Xiaomi']),
        'category' => 'phone',
        'image' => $faker->randomElement(['phone.jpg', 'phone2.jpg', 'phone3.jpg', 'phone4.jpg', 'phone5.jpg', 'phone6.jpg']),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 499.00),
        'description' => $faker->text(400),
        'stock' => $faker->randomDigitNotNull
    ];
});

$factory->defineAs(App\Product::class, 'laptop', function (Faker $faker) {
    return [
        'name' => $faker->word,
        'manufacturer' => $faker->randomElement(['apple', 'samsung', 'sony', 'Dell', 'Lenovo']),
        'category' => 'laptop',
        'image' => $faker->randomElement(['laptop.jpg', 'laptop2.jpg', 'laptop3.jpg', 'laptop4.jpg', 'laptop5.jpg', 'laptop6.jpg']),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 499.00),
        'description' => $faker->text(400),
        'stock' => $faker->randomDigitNotNull
    ];
});

$factory->defineAs(App\Product::class, 'accessory', function (Faker $faker) {
    return [
        'name' => $faker->word,
        'manufacturer' => $faker->randomElement(['apple', 'samsung', 'sony', 'Dell', 'Lenovo', 'amazon']),
        'category' => 'accessories',
        'image' => $faker->randomElement(['headphones.jpg', 'charger.jpg', 'charger2.jpg', 'case.jpg', 'case2.jpg', 'headphones.jpg']),
        'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 149.00),
        'description' => $faker->text(400),
        'stock' => $faker->randomDigitNotNull
    ];
});


// $factory->define(App\Product::class, function (Faker $faker) {
//     return [
//         'name' => $faker->word,
//         'manufacturer' => $faker->randomElement(['apple', 'samsung', 'microsoft', 'lenovo', 'amazon', 'dell', 'toshiba', 'sony']),
//         'category' => $faker->randomElement(['laptop', 'phone', 'accessory', 'audio', 'visual', 'desktop']),
//         'image' => $faker->randomElement(['laptop.jpg', 'laptop2.jpg', 'phone.jpg', 'phone2.jpg', 'case.jpg', 'case2.jpg', 'charger.jpg', 'charger2.jpg', 'monitor.jpg', 'monitor2.jpg', 'headphones.jpg', 'default.jpg']),
//         'price' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 99.00),
//         'description' => $faker->text(400),
//         'stock' => $faker->randomDigitNotNull
//     ];
// });


// 'image' => $faker->image('public/images',400,300,null,false),