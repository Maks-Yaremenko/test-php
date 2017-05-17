<?php

$factory->define(App\Recipe::class, function ($faker) {
    return [
        'name' => $faker->firstName(),
        'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
    ];
});