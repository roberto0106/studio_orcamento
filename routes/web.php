<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['middleware' => ['auth']], function () {
    Route::resource('clientes', 'ClientesController');
    Route::resource('coberturas', 'CoberturaController');
    Route::resource('orcamentos', 'OrcamentoController');
    Route::resource('orcamento_produtos', 'OrcamentoProdutosController');
    Route::resource('parametros', 'ParametrosController');
    Route::resource('produtos', 'ProdutosController');
    Route::resource('instituicoes', 'InstituicaoController');
    Route::resource('cursos', 'CursoController');
    
    //api
    Route::get('getcurso/{inst}','CursoController@getCurso');
    Route::get('getproduto/{cobertura}','ProdutosController@getProdutos');
    Route::get('refresh_produtos/{coberturas_array}','OrcamentoProdutosController@refresh_produtos');
    
});