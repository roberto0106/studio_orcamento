<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orcamento extends Model
{
    protected $fillable=[
        'id',
        'cliente_id',
        'data_evento',
        'qtd_formandos',
        'cidade',
        'consultor',
        'supervisor',
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'id');
    }
}
    