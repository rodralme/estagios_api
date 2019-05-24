<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Pessoa;
use App\Models\Endereco;
use Faker\Generator as Faker;

$factory->define(Pessoa::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->safeEmail,
        'nascimento' => $faker->dateTimeBetween('-30 years', '-10 years')->format('Y-m-d'),
        'telefone1' => $faker->phoneNumber,
        'telefone2' => $faker->optional()->phoneNumber,
        'sobre' => $faker->text,
        'endereco_id' => function() {
            return factory(Endereco::class)->create()->id;
        }
    ];
});
