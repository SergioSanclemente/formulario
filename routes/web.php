<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ExcelController;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name("actualizar");
Route::post('/actualizar', 'ExcelController@actualizarDatos');
//Route::get('/tap1', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/tap1', [App\Http\Controllers\TapController::class, 'tap1'])->name('tap1');
//Route::get('/tap2', [App\Http\Controllers\TapController::class, 'tap2'])->name('tap2');
//Route::get('/tap1', function () {return view('tap1');});
//Route::get('/tap2', function () {return view('tap2');});
