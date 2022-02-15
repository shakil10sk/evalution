<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->paragraph(50),
        'subcategory_id' => $faker->numberBetween(1, 10),
        'price' => $faker->numberBetween(250, 500),
    ];
});
