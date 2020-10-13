<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Email;
use Faker\Generator as Faker;

$factory->define(Email::class, function (Faker $faker) {
    return [
        'client_id' => factory(\App\Client::class),
        'from' => $faker->email,
        'to' => json_encode([$faker->email]),
        'cc' => json_encode([$faker->email]),
        'bcc' => json_encode([$faker->email]),
        'subject' => $faker->sentence,
        'message' => $faker->paragraph

    ];
});
