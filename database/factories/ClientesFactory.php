<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Clientes;
use Faker\Generator as Faker;

$factory->define(Clientes::class, function (Faker $faker) {
    return [
        'nome'=>$faker->name,
        'instituicao_id'=>function(){
            return factory(App\Instituicao::class)->create()->id;
        },
        'curso_id'=>function(){
            return factory(App\Curso::class)->create()->id;
        },
        'representante'=>$faker->name,
        'telefone'=>$faker->tollFreePhoneNumber,
        'ano_conclusao'=>$faker->year,
        'data_formatura'=>$faker->dateTimeBetween($startDate = '+1 years', $endDate = '+4 years', $timezone = null),
    ];
});
