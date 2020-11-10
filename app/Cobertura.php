<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model
{
    protected $fillable=['nome'];


    public static function getCoberturas(){
        $coberturas = \App\Cobertura::select('id', 'nome')->get()->toArray();

        if($coberturas){
            foreach ($coberturas as $obj){
                $return[$obj['id']] = $obj['nome'];
            }
            return $return;
        }else{
            $return = null;
            return $return;
        }
    }

    public function produtos()
    {
        return $this->hasMany(Produtos::class,'id');
    }
}
