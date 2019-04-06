<?php

use Faker\Generator as Faker;

$factory->define(App\Signature::class, function (Faker $faker) {
    return [
        'email' => $faker->email,
        'message' => $faker->paragraphs(rand(1, 3), true)
    ];
});
