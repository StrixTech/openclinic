<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Staff;
use Faker\Generator as Faker;

$factory->define(Staff::class, function (Faker $faker) {
    return [
        'staff_id' => $faker->randomNumber(6,true),
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail,
        'department' => 1,
        'monthly_pay' => $faker->numberBetween(1000,5000),
        'role' => 2,
    ];
});
