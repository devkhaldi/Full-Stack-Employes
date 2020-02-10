<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Job;
use Faker\Generator as Faker;

$factory->define(Job::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'min_salary' => $faker->numberBetween(20000, 40000),
        'max_salary' => $faker->numberBetween(200000, 400000)
    ];
});
