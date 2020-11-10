<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cobertura;
use Faker\Generator as Faker;

$factory->define(Cobertura::class, function (Faker $faker) {
    return [
        'nome' => $faker->company,
    ];
});
