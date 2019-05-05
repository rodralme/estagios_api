<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Enums\UF;
use App\Models\Endereco;
use Faker\Generator as Faker;

$factory->define(Endereco::class, function (Faker $faker) {
    return [
        'cep' => $faker->numberBetween(10000, 99999) . '-' . $faker->numberBetween(100, 999),
        'logradouro' => $faker->streetAddress,
        'numero' => $faker->randomDigitNotNull,
        'complemento' => $faker->optional(0.5)->buildingNumber,
        'bairro' => $faker->randomElement(['Centro', 'São Mateus', 'Bom Pastor', 'Passos', 'Manoel Honório', 'Vitorino Braga']),
        'cidade' => $faker->unique(false, 10000000)->city,
        'uf' => $faker->randomElement(UF::getValues()),
    ];
});
