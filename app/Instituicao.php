<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instituicao extends Model
{
    protected $table = 'instituicoes';

    protected $fillable = [
        'nome',
        'cidade',
        'estado',
    ];

    public function clientes()
    {
        return $this->hasMany(Clientes::class,'id');
    }

    public function cursos()
    {
        return $this->hasMany(Curso::class,'id');
    }

}
