<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Parametros;
use Faker\Generator as Faker;

$factory->define(Parametros::class, function (Faker $faker) {
    return [
        'produto_id'=>function(){
            return factory(App\Produtos::class)->create()->id;
        },
        'cobertura_id'=>function(){
            return factory(App\Cobertura::class)->create()->id;
        },
        'qtd_formandos_minima'=>$faker->numberBetween(1,10),
        'qtd_formandos_maxima'=>$faker->numberBetween(20,50),
        'qtd_produtos'=>$faker->randomNumber(2)
    ];
});
