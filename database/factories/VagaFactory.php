<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Empresa;
use App\Models\Vaga;
use Faker\Generator as Faker;

$factory->define(Vaga::class, function (Faker $faker) {
    return [
        'titulo' => $faker->title,
        'descricao' => $faker->realText(200),
        'remuneracao' => $faker->optional(0.3)->words(3, true),
        'carga_horaria' => $faker->optional()->numberBetween(20, 44),
        'empresa_id' => function() {
            return factory(Empresa::class)->create()->id;
        }
    ];
});
