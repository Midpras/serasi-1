<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\Level1Controller;
use App\Http\Controllers\Level2Controller;
use App\Http\Controllers\Level3Controller;
use App\Http\Controllers\TimController;

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

Route::resources(['pk'=>'App\Http\Controllers\PkController']);
Route::resources(['iku'=>'App\Http\Controllers\IkuController']);

Route::resources(['skp'=>'App\Http\Controllers\SkpController']);

Route::resources(['iki'=>'App\Http\Controllers\IkiController']);
Route::get('/iki/penugasan/{id}', [App\Http\Controllers\IkiController::class, 'penugasan']);
Route::get('/iki/penugasan_kab/{id}', [App\Http\Controllers\IkiController::class, 'penugasan_kab']);
Route::get('/iki/edit/{id}', [App\Http\Controllers\IkiController::class, 'edit']);
Route::post('/iki/update', [App\Http\Controllers\IkiController::class, 'update']);
Route::get('/iki/tugas/{id}', [App\Http\Controllers\IkiController::class, 'tugas']);
Route::get('/iki/tugas_edit/{id}', [App\Http\Controllers\CkpController::class, 'edit_tugas_prov']);
Route::post('/iki/update_tugas', [App\Http\Controllers\IkiController::class, 'update_tugas']);

Route::get('/download', [App\Http\Controllers\DownloadController::class, 'index']);
Route::post('/download', [App\Http\Controllers\DownloadController::class, 'download']);

#Master Kegiatan
Route::resources([  'kegiatan'=>KegiatanController::class,
                    'level1'=>Level1Controller::class,
                    'level2'=>Level2Controller::class,
                    'level3'=>Level3Controller::class,
                    'tim'=>TimController::class]);
Route::get('/level3/destroy/{id}', [App\Http\Controllers\Level3Controller::class, 'destroy'])->name('destroylevel3');
Route::get('/level2/destroy/{id}', [App\Http\Controllers\Level2Controller::class, 'destroy'])->name('destroylevel2');
Route::get('/level1/destroy/{id}', [App\Http\Controllers\Level1Controller::class, 'destroy'])->name('destroylevel1');
Route::get('/kegiatan/destroy/{id}', [App\Http\Controllers\KegiatanController::class, 'destroy'])->name('destroykegiatan');
Route::get('/tim/destroy/{id}', [App\Http\Controllers\TimController::class, 'destroy'])->name('destroytim');