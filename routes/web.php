<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TipoNF;
use App\Http\Controllers\ResultadoProcessamento;
use App\Http\Controllers\CSVController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/nfs/{tipo}', [TipoNF::class])
    ->name('processa_nf');

Route::post('processamento/nfs', [ResultadoProcessamento::class])
    ->name('processadas');

Route::post('/csv', [CSVController::class, 'processamento'])->name('processamento-csv');
