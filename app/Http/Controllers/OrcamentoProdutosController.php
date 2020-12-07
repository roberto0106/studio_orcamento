<?php

namespace App\Http\Controllers;

use App\Services\ParametroService;
use App\OrcamentoProdutos;
use App\Orcamento;
use App\Cobertura;
use App\Produtos;
use Illuminate\Http\Request;

class OrcamentoProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orcamento_produto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $orcamento_id = $request->session()->get('orcamento');
        $dados_orcamento = Orcamento::where('id',$orcamento_id)->get();
        $coberturas=Cobertura::all();
       
        return view('orcamento_produto.create',compact('dados_orcamento','coberturas'));     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrcamentoProdutos  $orcamentoProdutos
     * @return \Illuminate\Http\Response
     */
    public function show(OrcamentoProdutos $orcamentoProdutos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrcamentoProdutos  $orcamentoProdutos
     * @return \Illuminate\Http\Response
     */
    public function edit(OrcamentoProdutos $orcamentoProdutos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrcamentoProdutos  $orcamentoProdutos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrcamentoProdutos $orcamentoProdutos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrcamentoProdutos  $orcamentoProdutos
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrcamentoProdutos $orcamentoProdutos)
    {
        //
    }


    public function inserir_cobertura($cobertura,$formandos){
        
        $produtos = Produtos::where('cobertura_id',$cobertura)->get();
        $p = new ParametroService;
        $parametros['produtos'] = $p->mostrar($formandos,$cobertura);
        $parametros['cobertura'] = Cobertura::find($cobertura)->get();
     
        return $parametros;

    }
}
