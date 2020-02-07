<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Callback;
use Faker\Generator as Faker;

$factory->define(Callback::class, function (Faker $faker) {
    return [
        'phone' => $faker->phoneNumber,
        'name' => $faker->name,
    ];
});
