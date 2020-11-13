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

//Pagina Inicial

Route::get('/', function(){return view('index');})->name('home.index');

//Procura route

Route::get('/pesquisa','App\Http\Controllers\ProcuraController@index')->name('procura.index');

Route::post('/procura/resultado', 'App\Http\Controllers\ProcuraController@pesquisa')->name('pesquisa.show');

//Categoria Route

Route::get('/categoria','App\Http\Controllers\CategoriasController@index')->name('categoria.index');

Route::get('/categoria/{id}/show','App\Http\Controllers\CategoriasController@show')->name('categoria.show');

//Encomenda Route

Route::get('/encomenda','App\Http\Controllers\EncomendasController@index')->name('encomenda.index');

Route::get('/encomenda/{id}/show','App\Http\Controllers\EncomendasController@show')->name('encomenda.show');

//Fornecedor Route

Route::get('/fornecedor','App\Http\Controllers\FornecedoresController@index')->name('fornecedor.index');

Route::get('/fornecedor/{id}/show','App\Http\Controllers\FornecedoresController@show')->name('fornecedor.show');

//Produto Route

Route::get('/produto','App\Http\Controllers\ProdutosController@index')->name('produto.index');

Route::get('/produto/{id}/show','App\Http\Controllers\ProdutosController@show')->name('produto.show');

//Vendedor Route

Route::get('/vendedor','App\Http\Controllers\VendedoresController@index')->name('vendedor.index');

Route::get('/vendedor/{id}/show','App\Http\Controllers\VendedoresController@show')->name('vendedor.show');
