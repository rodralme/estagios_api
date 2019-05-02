<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Perfil::class, function (Faker $faker) {
    return [
        'nome' => $faker->unique()->word,
        'nivel' => $faker->numberBetween(1, 10),
    ];
});
