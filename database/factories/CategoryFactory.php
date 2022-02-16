<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'description' => $faker->word(20),
        'subcategory_id' => $faker->numberBetween(1, 10),
        'slug' => $faker->numberBetween(1, 10),
    ];
});
