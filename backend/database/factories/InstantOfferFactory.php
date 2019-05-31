<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\InstantOffer;
use Faker\Generator as Faker;

$factory->define(InstantOffer::class, function (Faker $faker) {
    return [
        'email' => $faker->safeEmail,
        'address' => $faker->streetAddress,
        'city' => $faker->city,
        'state' => $faker->stateAbbr,
        'zip' => $faker->postcode,
        'bedrooms' => $faker->randomDigitNotNull,
        'bathrooms' => $faker->randomDigitNotNull,
        'square_footage' => $faker->numberBetween(400, 6000),
    ];
});
