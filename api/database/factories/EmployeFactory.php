<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Departement;
use App\Employe;
use App\Job;
use Faker\Generator as Faker;

$factory->define(Employe::class, function (Faker $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->email,
        'photo' => $faker->imageUrl(800, 600, 'people'),
        'job_id' => function () {
            return Job::all()->random()->id;
        },
        'departement_id' => function () {
            return Departement::all()->random()->id;
        },
    ];
});
