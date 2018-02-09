<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => 'product name',
        'price' => mt_rand(1*10, 5*10) * 1000, // from 10000 to 50000
        'description' => '',
    ];
});
