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

Route::get('/', 'App\Http\Controllers\IndexController@index')->name('index.procura');

//Procura route

Route::get('/pesquisa','App\Http\Controllers\ProcuraController@index')->name('procura.index');

Route::post('/procura/resultado', 'App\Http\Controllers\ProcuraController@pesquisa')->name('pesquisa.show');

//Categoria Route

Route::get('/categoria','App\Http\Controllers\CategoriasController@index')->name('categoria.index');

Route::get('/categoria/{id}/show','App\Http\Controllers\CategoriasController@show')->name('categoria.show');

Route::get('/categoria/create','App\Http\Controllers\CategoriasController@create')->name('categoria.create');

Route::get('/categoria/store','App\Http\Controllers\CategoriasController@store')->name('categoria.store');

Route::get('/categoria/{id}/edit','App\Http\Controllers\CategoriasController@edit')->name('categoria.edit');

Route::patch('/categoria/{id}/update','App\Http\Controllers\CategoriasController@update')->name('categoria.update');

Route::get('/categoria/{id}/delete','App\Http\Controllers\CategoriasController@delete')->name('categoria.delete');

Route::delete('/categoria/{id}/destroy','App\Http\Controllers\CategoriasController@destroy')->name('categoria.destroy');

//Encomenda Route

Route::get('/encomenda','App\Http\Controllers\EncomendasController@index')->name('encomenda.index');

Route::get('/encomenda/{id}/show','App\Http\Controllers\EncomendasController@show')->name('encomenda.show');

Route::get('/encomenda/create','App\Http\Controllers\EncomendasController@create')->name('encomenda.create');

Route::post('/encomenda/store','App\Http\Controllers\EncomendasControler@store')->name('encomenda.store');

Route::get('/encomenda/{id}/edit','App\Http\Controllers\EncomendasController@edit')->name('encomenda.edit');

Route::patch('/encomenda/{id}/update','App\Http\Controllers\EncomendasController@update')->name('encomenda.update');

Route::get('/encomenda/{id}/delete','App\Http\Controllers\EncomendasController@delete')->name('encomenda.delete');

Route::delete('/encomenda/{id}/destroy','App\Http\Controllers\EncomendasController@destroy')->name('encomenda.destroy');
//Fornecedor Route

Route::get('/fornecedor','App\Http\Controllers\FornecedoresController@index')->name('fornecedor.index');

Route::get('/fornecedor/{id}/show','App\Http\Controllers\FornecedoresController@show')->name('fornecedor.show');

Route::get('/fornecedor/create','App\Http\Controllers\FornecedoresController@create')->name('fornecedor.create');

Route::post('/fornecedor/store','App\Http\Controllers\FornecedoresController@store')->name('fornecedor.store');

Route::get('/fornecedor/{id}/edit','App\Http\Controllers\FornecedoresController@edit')->name('fornecedor.edit');

Route::patch('/fornecedor/{id}/update','App\Http\Controllers\FornecedoresController@update')->name('fornecedor.update');

Route::get('/fornecedor/{id}/delete','App\Http\Controllers\FornecedoresController@delete')->name('fornecedor.delete');

Route::delete('/fornecedor/{id}/destroy','App\Http\Controllers\FornecedoresController@destroy')->name('fornecedor.destroy');

//Produto Route

Route::get('/produto','App\Http\Controllers\ProdutosController@index')->name('produto.index');

Route::get('/produto/{id}/show','App\Http\Controllers\ProdutosController@show')->name('produto.show');

Route::get('/produto/create','App\Http\Controllers\ProdutosController@create')->name('produto.create');

Route::post('/produto/store','App\Http\Controllers\ProdutosController@store')->name('produto.store');

Route::get('/produto/{id}/edit','App\Http\Controllers\ProdutosController@edit')->name('produto.edit');

Route::patch('/produto/{id}/update','App\Http\Controllers\ProdutosController@update')->name('produto.update');

Route::get('/produto/{id}/delete','App\Http\Controllers\ProdutosController@delete')->name('produto.delete');

Route::delete('/produto/{id}/destroy','App\Http\Controllers\ProdutosController@destroy')->name('produto.destroy');

//Vendedor Route

Route::get('/vendedor','App\Http\Controllers\VendedoresController@index')->name('vendedor.index');

Route::get('/vendedor/{id}/show','App\Http\Controllers\VendedoresController@show')->name('vendedor.show');

Route::get('/vendedor/create','App\Http\Controllers\VendedoresController@create')->name('vendedor.create');

Route::post('/vendedor/store','App\Http\Controllers\VendedoresController@store')->name('vendedor.store');

Route::get('/vendedor/{id}/edit','App\Http\Controllers\VendedoresController@edit')->name('vendedor.edit');

Route::patch('/vendedor/{id}/update','App\Http\Controllers\VendedoresController@update')->name('vendedor.update');

Route::get('/vendedor/{id}/delete','App\Http\Controllers\VendedoresController@delete')->name('vendedor.delete');

Route::delete('/vendedor/{id}/destroy','App\Http\Controllers\VendedoresController@destroy')->name('vendedor.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
