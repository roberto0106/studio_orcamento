<?php

namespace App\Http\Controllers;

use App\Produtos;
use App\Cobertura;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produtos::all();
        return view('produtos.index',compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $coberturas = Cobertura::getCoberturas();
        return view('produtos.create',compact('coberturas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $p = new Produtos;
        $p->cobertura_id = $request['cobertura_id'];
        $p->nome = $request['nome'];
        $p->preco_venda = $request['preco_venda'];
        $p->preco_custo = $request['preco_custo'];

        $p->save();

        return redirect()->route("produtos.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function show(Produtos $produtos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function edit(Produtos $produtos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produtos $produtos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produtos  $produtos
     * @return \Illuminate\Http\Response
     */
    public function destroy($produtos)
    {
        $p = Produtos::find($produtos);
        $p->delete();

        return redirect()->route('produtos.index');
    }

    public function getProdutos($cobertura){
        $p = Produtos::select('id','nome')->where('cobertura_id',$cobertura)->get(); 
        $produtos=[];

        dd($produtos);

        foreach ($p as $key => $value) {
            $produtos[$value->id]=$value->nome;
        }
        
        return $produtos;
    }
}
