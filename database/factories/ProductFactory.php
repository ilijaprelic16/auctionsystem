<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->name,
        'description' => $faker->text(100),
        'starting_price' => $faker->randomFloat(2,0,10000),
    ];
});
