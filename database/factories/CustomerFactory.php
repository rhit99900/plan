<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'first_name'    => $faker->name,
        'last_name'     => $faker->name,
        'email'         => $faker->email,
        'phone'         => $faker->phoneNumber,
        'email_verified_at' => $faker->dateTime($max = 'now', $timezone = null),
        'added_on'      => $faker->dateTime($max = 'now', $timezone = null),
        'updated_on'    => $faker->dateTime($max = 'now', $timezone = null),
        'password'      => $faker->text(20)
    ];
});
