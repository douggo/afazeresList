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

//Routes para a rotina de pessoas
Route::post('/pessoas/adiciona', "PessoaController@adiciona");
Route::post('/pessoas/update', "PessoaController@update");
Route::get('/pessoas', "PessoaController@lista")->middleware('auth');
Route::get('/pessoas/novo', "PessoaController@novo")->middleware('auth');
Route::get('/pessoas/altera/{id}', "PessoaController@altera");
Route::get('/pessoas/remover/{id}', "PessoaController@remove");

//Routes para a rotina de listas
Route::post('/listas/adiciona', "ListaController@adiciona");
Route::post('/listas/update', "ListaController@update");
Route::get('/listas', "ListaController@lista")->middleware('auth');
Route::get('/listas/novo', "ListaController@novo")->middleware('auth');
Route::get('/listas/altera/{id}', "ListaController@altera");
Route::get('/listas/remover/{id}', "ListaController@remove");

//Routes para a rotina de afazeres_lista
Route::post('/afazeresLista/adiciona', "AfazerListaController@adiciona");
Route::get('/afazeresLista/{id}', "AfazerListaController@lista")->middleware('auth');
Route::get('/afazeresLista/remover/{id}', "AfazerListaController@remove");