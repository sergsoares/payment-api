<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'flag' => $faker->creditCardType,
        'number' => $faker->creditCardNumber,
        'date' => $faker->creditCardExpirationDateString
    ];
});
