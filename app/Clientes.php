<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $fillable = [
    'id',
    'instituicao_id',
    'nome',
    'curso_id',
    'representante',
    'telefone',
    'ano_conclusao',
    'data_formatura',

    ];

    public function instituicao()
    {
        return $this->belongsTo(Instituicao::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
