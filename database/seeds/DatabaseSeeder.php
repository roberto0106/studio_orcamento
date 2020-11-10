<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Instituicao::class,10)->create();
        factory(\App\Curso::class,10)->create();
        factory(\App\Clientes::class, 10)->create();
        factory(\App\Cobertura::class, 10)->create();
        factory(\App\Produtos::class, 10)->create();
        
       
    }
}
