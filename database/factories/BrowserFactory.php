<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Browser;
use Faker\Generator as Faker;

$factory->define(Browser::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->randomElement(['Opera', 'Mozilla', 'Google Chrome', 'Safari', 'Yandex Browser'])
    ];
});
