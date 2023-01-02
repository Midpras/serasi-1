<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\Level1Controller;
use App\Http\Controllers\Level2Controller;
use App\Http\Controllers\Level3Controller;
use App\Http\Controllers\TimController;
use App\Http\Controllers\UsersController;
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


// // Kegiatan Level 1
// Route::get('/keglvl1', [App\Http\Controllers\HomeController::class, 'level1'])->name('keglvl1');
// Route::post('/keglvl1/input', [App\Http\Controllers\KegiatanController::class, 'inputLevel1'])->name('inputkeglvl1');
// Route::get('/keglvl1/destroy/{id}', [App\Http\Controllers\KegiatanController::class, 'destroyLevel1'])->name('destroykeglvl1');
// Route::get('/keglvl1/edit/{id}', [App\Http\Controllers\KegiatanController::class, 'editLevel1'])->name('editkeglvl1');
// Route::put('/keglvl1/update/{id}', [App\Http\Controllers\KegiatanController::class, 'updateLevel1'])->name('updatekeglvl1');

// // Kegiatan Level 2
// Route::get('/keglvl2', [App\Http\Controllers\HomeController::class, 'level2'])->name('keglvl2');
// Route::post('/keglvl2/input', [App\Http\Controllers\KegiatanController::class, 'inputLevel2'])->name('inputkeglvl2');
// Route::get('/keglvl2/destroy/{id}', [App\Http\Controllers\KegiatanController::class, 'destroyLevel2'])->name('destroykeglvl2');
// Route::get('/keglvl2/edit/{id}', [App\Http\Controllers\KegiatanController::class, 'editLevel2'])->name('editkeglvl2');
// Route::put('/keglvl2/update/{id}', [App\Http\Controllers\KegiatanController::class, 'updateLevel2'])->name('updatekeglvl2');

// // Kegiatan Level 3
// Route::get('/keglvl3', [App\Http\Controllers\HomeController::class, 'level3'])->name('keglvl3');
// Route::post('/keglvl3/input', [App\Http\Controllers\KegiatanController::class, 'inputLevel3'])->name('inputkeglvl3');
// Route::get('/keglvl3/destroy/{id}', [App\Http\Controllers\KegiatanController::class, 'destroyLevel3'])->name('destroykeglvl3');
// Route::get('/keglvl3/edit/{id}', [App\Http\Controllers\KegiatanController::class, 'editLevel3'])->name('editkeglvl3');
// Route::put('/keglvl3/update/{id}', [App\Http\Controllers\KegiatanController::class, 'updateLevel3'])->name('updatekeglvl3');

Route::resources(['pk'=>'App\Http\Controllers\PkController']);
Route::get('/laporan/create/{tanggal}', [App\Http\Controllers\LaporanController::class, 'create'])->name('createlaporan');
Route::get('/laporan/create/kegiatan/{tanggal}/{pegawai}', [App\Http\Controllers\LaporanController::class, 'tambahkegiatan'])->name('tambahkegiatan');
Route::resources([  'kegiatan'=>KegiatanController::class,
                    'level1'=>Level1Controller::class,
                    'level2'=>Level2Controller::class,
                    'level3'=>Level3Controller::class,
                    'tim'=>TimController::class,
                    'users'=>UsersController::class,
                    'laporan'=>LaporanController::class]);
Route::get('/users/create/{id}', [App\Http\Controllers\UsersController::class, 'getNIP'])->name('getNIP');
Route::get('/level3/destroy/{id}', [App\Http\Controllers\Level3Controller::class, 'destroy'])->name('destroylevel3');
Route::get('/level2/destroy/{id}', [App\Http\Controllers\Level2Controller::class, 'destroy'])->name('destroylevel2');
Route::get('/level1/destroy/{id}', [App\Http\Controllers\Level1Controller::class, 'destroy'])->name('destroylevel1');
Route::get('/kegiatan/destroy/{id}', [App\Http\Controllers\KegiatanController::class, 'destroy'])->name('destroykegiatan');
Route::get('/tim/destroy/{id}', [App\Http\Controllers\TimController::class, 'destroy'])->name('destroytim');
Route::get('/users/destroy/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('destroyusers');



