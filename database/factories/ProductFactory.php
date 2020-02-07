<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'category_id' => function(){
            return Category::all()->random();
        },
        'name' => $faker->word,
        'text' => $faker->text,
        'price' => random_int(10,100)
    ];
});
