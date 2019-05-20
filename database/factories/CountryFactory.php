<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Country;
use Faker\Generator as Faker;

$factory->define(Country::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->country
    ];
});
