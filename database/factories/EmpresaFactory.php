<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Empresa;
use App\Models\Endereco;
use Faker\Generator as Faker;

$factory->define(Empresa::class, function (Faker $faker) {
    $nome = $faker->company;
    return [
        'nome' => $nome,
        'email' => $faker->safeEmail,
        'razao_social' => $nome . ' LTDA',
        'cnpj' => $faker->cnpj,
        'telefone1' => $faker->phoneNumber,
        'telefone2' => $faker->optional()->phoneNumber,
        'sobre' => $faker->text,
        'endereco_id' => function() {
            return factory(Endereco::class)->create()->id;
        }
    ];
});
