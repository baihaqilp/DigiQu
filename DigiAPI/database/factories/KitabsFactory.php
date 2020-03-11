<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Kitabs;
use Faker\Generator as Faker;

$factory->define(Kitabs::class, function (Faker $faker) {
    return [
        'kategori' => $faker->state,
        'judul_kitab' => $faker->name,
        'sampul' => $faker->city,
        'link' => $faker->address
    ];
});
