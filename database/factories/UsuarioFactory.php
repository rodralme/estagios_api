<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Models\Perfil;
use App\Models\Usuario;
use Faker\Generator as Faker;

$factory->define(Usuario::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt('abcd0123'),
        'remember_token' => $faker->word,
        'perfil_id' => function() {
            return factory(Perfil::class)->create()->id;
        }
    ];
});
