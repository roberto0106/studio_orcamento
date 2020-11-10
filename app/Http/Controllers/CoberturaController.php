<?php

namespace App\Http\Controllers;

use App\Cobertura;
use Illuminate\Http\Request;

class CoberturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coberturas = Cobertura::all();
        return view('coberturas.index', compact ('coberturas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coberturas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $c = new Cobertura;
       $c->nome = $request->nome;
       $c->save();

       return redirect()->route('coberturas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cobertura  $cobertura
     * @return \Illuminate\Http\Response
     */
    public function show(Cobertura $cobertura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cobertura  $cobertura
     * @return \Illuminate\Http\Response
     */
    public function edit(Cobertura $cobertura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cobertura  $cobertura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cobertura $cobertura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cobertura  $cobertura
     * @return \Illuminate\Http\Response
     */
    public function destroy($cobertura)
    {
        $c = Cobertura::find($cobertura);
        $c->delete();

        return redirect()->route('coberturas.index');
    }
}
