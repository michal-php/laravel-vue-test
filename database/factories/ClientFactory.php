<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Client;
use Faker\Generator as Faker;

$factory->define(Client::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'date_of_birth' => $faker->date(),
        'birth_number' => $faker->numberBetween(),
        'phone' => $faker->phoneNumber(),
        'city' => $faker->city(),
        'zip' => $faker->postcode(),
        'street' => $faker->streetName(),
        'country' => $faker->country(),
        'nationality' => $faker->country()
    ];
});
