<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/keglvl1', [App\Http\Controllers\HomeController::class, 'level1'])->name('keglvl1');
Route::post('/keglvl1/input', [App\Http\Controllers\KegiatanController::class, 'inputLevel1'])->name('inputkeglvl1');
Route::get('/keglvl1/destroy/{id}', [App\Http\Controllers\KegiatanController::class, 'destroyLevel1'])->name('destroykeglvl1');



Route::resources(['pk'=>'App\Http\Controllers\PkController']);