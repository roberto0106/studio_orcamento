<?php

namespace App\Services;

use App\Parametros;

class ParametroService{

    public function mostrar($formandos,$categoria){
        
        $parametros= Parametros::select('produto_id','qtd_produtos')
        ->where('cobertura_id',$categoria)
        ->where('qtd_formandos_minima','<=',$formandos)
        ->where('qtd_formandos_maxima','>=',$formandos)
        ->get();
        
        return $parametros;
    }


}