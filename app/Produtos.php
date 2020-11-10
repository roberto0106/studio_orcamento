<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produtos extends Model
{
    protected $fillable = ['cobertura_id','nome','preco_venda','preco_custo'];

    public function cobertura()
    {
        return $this->belongsTo(Cobertura::class);
    }
 
}


  
