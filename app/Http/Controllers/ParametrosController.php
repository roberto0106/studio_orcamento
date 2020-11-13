<?php

namespace App\Http\Controllers;

use App\Parametros;
use App\Cobertura;
use Illuminate\Http\Request;

class ParametrosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parametros = Parametros::all();
       
        if($parametros->count()>0){
            return view('parametros.index', compact('parametros'));
        }else{
            $parametros = [];
            return view('parametros.index', compact('parametros'));
        }

       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $c = Cobertura::all();
        $coberturas = [];
        foreach ($c as $key => $value) {
            $coberturas[$value->id]=$value->nome;
        }

        return view('parametros.create',compact('coberturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Parametros::create([
            "cobertura_id" => $request->cobertura_id,
            "produto_id" => $request->produto_id,
            "qtd_formandos_minima" => $request->qtd_formandos_minima,
            "qtd_formandos_maxima" => $request->qtd_formandos_maxima,
            "qtd_produtos" => $request->qtd_produtos
        ]);

        return redirect()->route('parametros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parametros  $parametros
     * @return \Illuminate\Http\Response
     */
    public function show(Parametros $parametros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parametros  $parametros
     * @return \Illuminate\Http\Response
     */
    public function edit(Parametros $parametros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parametros  $parametros
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Parametros $parametros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parametros  $parametros
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parametros $parametros)
    {
        //
    }
}
