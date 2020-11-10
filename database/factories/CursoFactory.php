<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Curso;
use Faker\Generator as Faker;

$factory->define(Curso::class, function (Faker $faker) {
    return [
        'instituicao_id'=>function(){
            return factory(App\Instituicao::class)->create()->id;
        },
        'nome'=>$faker->company,
        'contato'=>$faker->name,
        'telefone'=>$faker->tollFreePhoneNumber,
    ];
});
