<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\AreaAtuacao;
use App\Models\Empresa;
use App\Models\Usuario;
use App\Models\Vaga;
use Faker\Generator as Faker;

$factory->define(Vaga::class, function (Faker $faker) {

    return [
        'titulo' => $faker->sentence,
        'descricao' => $faker->realText(200),
        'inicio' => $faker->dateTimeBetween('-5 days', '5 days'),
        'fim' => $faker->dateTimeBetween('6 days', '36 days'),
        'remuneracao' => $faker->optional(0.3)->words(3, true),
        'carga_horaria' => $faker->optional()->numberBetween(20, 44),
        'email' => $faker->companyEmail,
        'telefone' => $faker->numberBetween(14, 15),
        'empresa' => $faker->company,
        'area_atuacao_id' => function() {
            return factory(AreaAtuacao::class)->create()->id;
        },
        'usuario_id' => function() {
            return factory(Usuario::class)->create()->id;
        },
    ];
});
