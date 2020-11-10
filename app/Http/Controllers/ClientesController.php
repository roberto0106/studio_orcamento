<?php

namespace App\Http\Controllers;

use App\Clientes;
use App\Instituicao;
use App\Curso;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Clientes::all();
        return view('clientes.index',compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inst = Instituicao::select('id','nome')->get();
        $instituicoes = [];
        
        foreach ($inst as $key => $value) {
            $instituicoes[$key+1]=$value->nome;
        }

        // dd($instituicao);

        return view('clientes.create',compact('instituicoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Clientes::create([
        'instituicao_id'=>$request->instituicao, 
        'curso_id'=>$request->curso, 
        'nome'=>$request->nome, 
        'representante'=>$request->representante, 
        'telefone'=>$request->telefone, 
        'ano_conclusao'=>$request->ano_conclusao, 
        'data_formatura'=>$request->data_formatura    
       ]);
       
       return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function show(Clientes $clientes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function edit(Clientes $clientes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Clientes $clientes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Clientes  $clientes
     * @return \Illuminate\Http\Response
     */
    public function destroy($clientes)
    {

        $c = Clientes::find($clientes);
        $c->delete();

        return redirect()->route('clientes.index');

    }

    
}
