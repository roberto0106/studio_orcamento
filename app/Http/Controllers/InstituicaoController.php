<?php

namespace App\Http\Controllers;

use App\Instituicao;
use App\Cursos;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instituicoes = Instituicao::all();
        return view('instituicoes.index',compact('instituicoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('instituicoes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Instituicao::create([
            'nome'=>$request->nome,
            'cidade'=>$request->cidade,
            'estado'=>$request->estado,
        ]);

        return redirect()->route('instituicoes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function show(Instituicao $instituicao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function edit(Instituicao $instituicao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Instituicao $instituicao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Instituicao  $instituicao
     * @return \Illuminate\Http\Response
     */
    public function destroy($instituicao)
    {
        Instituicao::find($instituicao)->delete();
        return redirect()->route('instituicoes.index');
    }
}
