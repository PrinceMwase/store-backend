<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */




use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->numberBetween(1, 2000),
        'category_id' =>1,
        'store_id' => 1,
        'photo_id' => 3,
        'status' => 'active',

    ];
});
