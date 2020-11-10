<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instituicao;
use Faker\Generator as Faker;

$factory->define(Instituicao::class, function (Faker $faker) {
    return [
        'nome'=>$faker->company,
        'cidade'=>$faker->city,
        'estado'=>$faker->state
    ];
});
