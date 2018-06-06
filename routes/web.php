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
    return view('home');
});

Route::get('/deputados', 'DeputadosController@index');
Route::get('/deputado/{id}/despesas/', 'DeputadosController@despesas');
Route::get('/deputado/{id}', 'DeputadosController@show');

Route::get('/vereadores', 'VereadoresController@index');
Route::get('/vereador/{id}', 'VereadoresController@show');

Route::get('/senadores', 'SenadoresController@index');

Route::get('partidos', 'PartidoController@index');
Route::get('/partido/{id}', 'PartidoController@show');
