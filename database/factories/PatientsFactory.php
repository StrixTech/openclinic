<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Patients;
use Faker\Generator as Faker;

$factory->define(Patients::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'mrn' => $faker->randomNumber(6, true),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        ''
    ];
});
