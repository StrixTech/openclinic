<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Patients;
use Faker\Generator as Faker;

$factory->define(Patients::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'middle_name' => '',
        'last_name' => $faker->lastName,
        'mrn' => $faker->randomNumber(6, true),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'weight' => $faker->randomNumber(2, true),
        'date_of_birth' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'allergies' => '',
        'gender' => array_rand(['male', 'female']),
    ];
});
