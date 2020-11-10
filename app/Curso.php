<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'instituicao_id',
        'nome',
        'contato',
        'telefone',
    ];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class);
    }

    public function clientes()
    {
        return $this->hasMany(Clientes::class,'id');
    }
}
