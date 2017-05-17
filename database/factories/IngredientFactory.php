<?php

$factory->define(App\Ingredient::class, function ($faker) {
    return [
    'name' => $faker->company(),
    ];
});