<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/pagina-inicial', 'ControladorDeNoticias@index');
Route::get('/cadastro', 'ControladorDeNoticias@create')->middleware('auth');
Route::post('/cadastro', 'ControladorDeNoticias@store')->middleware('auth');
Route::delete('/pagina-inicial/remover/{id}', 'ControladorDeNoticias@destroy')
	->middleware('auth');
Route::get('/pesquisa', 'ControladorDePesquisa@index');

Auth::routes();

Route::get('/sair', function () {
	Auth::logout();
	return redirect('/login');
});
