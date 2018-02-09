<?php

use Faker\Generator as Faker;

$factory->define(App\Merchant::class, function (Faker $faker) {
    return [
        'name' => $faker->company,
        'description' => $faker->bs,
        'phone' => $faker->phoneNumber,
        'open_time' => '09:00:00',
        'close_time' => '17:00:00',
    ];
});
