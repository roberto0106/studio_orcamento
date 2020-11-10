<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametros extends Model
{
    protected $fillable = [
        'produto_id',
        'cobertura_id',
        'qtd_formandos_minima',
        'qtd_formandos_maxima',
        'qtd_produtos'
    ];

    public function cobertura()
    {
        return $this->belongsTo(Cobertura::class, 'id');
    }

    public function produto()
    {
        return $this->belongsTo(Produtos::class, 'id');
    }
}
