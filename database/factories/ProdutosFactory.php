<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Produtos;
use Faker\Generator as Faker;

$factory->define(Produtos::class, function (Faker $faker) {
    return [
        'cobertura_id'=>function(){
            return factory(App\Cobertura::class)->create()->id;
        },
        'nome'=>$faker->name,
        'preco_venda'=>$faker->randomNumber(2),
        'preco_custo'=>$faker->randomNumber(2)
    ];
});
