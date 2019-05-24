<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;

$factory->define(\App\Models\AreaAtuacao::class, function (Faker $faker) {

    $words = $faker->words(2);

    $sigla = '';
    foreach ($words as $word) {
        $sigla .= substr($word, 0, 1);
    }

    return [
        'nome' => join(' ', $words),
        'sigla' => $sigla,
    ];
});
