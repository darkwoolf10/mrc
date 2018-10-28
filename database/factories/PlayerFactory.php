<?php

use Faker\Generator as Faker;

$factory->define(App\Player::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'surname' => $faker->name,
        'rank' => $faker->numberBetween($min = 1, $max = 3),
        'birthday' => date($format = 'Y-m-d', $max = 'now'),
    ];
});