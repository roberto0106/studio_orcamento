<?php

namespace App\Services;

use App\Parametros;
use App\Produtos;

class ParametroService{

    public function mostrar($formandos,$cobertura){

        $produtos = Produtos::where('cobertura_id',$cobertura)->get();
        
        $parametros= Parametros::where('cobertura_id',$cobertura)
        ->where('qtd_formandos_minima','<=',$formandos)
        ->where('qtd_formandos_maxima','>=',$formandos)
        ->get();

        $return = [];
        
        foreach ($produtos as $key => $valueProduto) {
            foreach ($parametros as $key => $valueParametro) {
                if ($valueParametro->produto_id == $valueProduto->id) {
                    $return[$valueProduto->id]['nome']=$valueProduto->nome; 
                    $return[$valueProduto->id]['cobertura']=$valueProduto->cobertura->nome;
                    $return[$valueProduto->id]['quantidade']=$valueParametro->qtd_produtos;
                    $return[$valueProduto->id]['preco_venda']=$valueProduto->preco_venda; 
                    $return[$valueProduto->id]['valor_total']=$valueProduto->preco_venda * $valueParametro->qtd_produtos;
                }
            }
            
        }
        

        return $return;
    }


}