<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrcamentoController;

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


Route::get('/', [OrcamentoController::class, 'Index']);
Route::get('/cadastro', [OrcamentoController::class, 'Cadastro']);
Route::post('/', [OrcamentoController::class, 'Index'])->name('index');
Route::post('/salvar/{id}', [OrcamentoController::class, 'Salvar'])->name('cadastro');
Route::post('/cadastro', [OrcamentoController::class, 'Editar'])->name('editar');
Route::delete('/excluir/{id}', [OrcamentoController::class, 'Excluir'])->name('excluir');
Route::get('/buscar/{id}', [OrcamentoController::class, 'Show'])->name('buscar');