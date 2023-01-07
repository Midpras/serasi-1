<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\Level1Controller;
use App\Http\Controllers\Level2Controller;
use App\Http\Controllers\Level3Controller;
use App\Http\Controllers\TimController;
use App\Http\Controllers\PkController;
use App\Http\Controllers\IkuController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\UsersController;

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

Route::resource('pk', PkController::class)->middleware('kepala');
Route::resource('iku', IkuController::class)->middleware('kepala');
Route::post('/iki/tugasiku', [App\Http\Controllers\IkiController::class, 'tugasiku']);

Route::get('/download', [App\Http\Controllers\DownloadController::class, 'index']);
Route::post('/downloadckp', [App\Http\Controllers\DownloadController::class, 'download']);


Route::resources(['skp'=>'App\Http\Controllers\SkpController']);
Route::get('/skp/edit/{id}', [App\Http\Controllers\SkpController::class, 'edit']);
Route::post('/skp/update', [App\Http\Controllers\SkpController::class, 'update']);

Route::resources(['iki'=>'App\Http\Controllers\IkiController']);
Route::get('/iki/penugasan/{id}', [App\Http\Controllers\IkiController::class, 'penugasan']);
Route::get('/iki/penugasan_kab/{id}', [App\Http\Controllers\IkiController::class, 'penugasan_kab']);
Route::get('/iki/edit/{id}', [App\Http\Controllers\IkiController::class, 'edit']);
Route::post('/iki/update', [App\Http\Controllers\IkiController::class, 'update']);
Route::get('/iki/tugas/{id}', [App\Http\Controllers\IkiController::class, 'tugas']);
Route::get('/iki/tugas_edit/{id}', [App\Http\Controllers\CkpController::class, 'edit_tugas_prov']);
Route::post('/iki/update_tugas', [App\Http\Controllers\IkiController::class, 'update_tugas']);
Route::get('/iki/tugas_hapus/{id}', [App\Http\Controllers\IkiController::class, 'hapus_tugas']);

// Route::get('/download', [App\Http\Controllers\DownloadController::class, 'index'])->middleware('admin');
// Route::post('/download', [App\Http\Controllers\DownloadController::class, 'download'])->middleware('admin');

#Master Kegiatan
// Route::resources([  'kegiatan'=>KegiatanController::class,
//                     'level1'=>Level1Controller::class,
//                     'level2'=>Level2Controller::class,
//                     'level3'=>Level3Controller::class,
//                     'tim'=>TimController::class]);
Route::resource('kegiatan', KegiatanController::class)->middleware('admin');
Route::resource('level1', Level1Controller::class)->middleware('admin');
Route::resource('level2', Level2Controller::class)->middleware('admin');
Route::resource('level3', Level3Controller::class)->middleware('admin');
Route::resource('tim', TimController::class)->middleware('admin');
Route::resource('users', UsersController::class)->middleware('admin');
Route::resource('laporan', LaporanController::class);

Route::get('/level3/destroy/{id}', [App\Http\Controllers\Level3Controller::class, 'destroy'])->name('destroylevel3');
Route::get('/level2/destroy/{id}', [App\Http\Controllers\Level2Controller::class, 'destroy'])->name('destroylevel2');
Route::get('/level1/destroy/{id}', [App\Http\Controllers\Level1Controller::class, 'destroy'])->name('destroylevel1');
Route::get('/kegiatan/destroy/{id}', [App\Http\Controllers\KegiatanController::class, 'destroy'])->name('destroykegiatan');
Route::get('/tim/destroy/{id}', [App\Http\Controllers\TimController::class, 'destroy'])->name('destroytim');

Route::get('/users/create/users/carinip', [App\Http\Controllers\UsersController::class, 'getNIP'])->name('getNIP');
Route::get('/users/destroy/{id}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('destroyusers');

Route::get('/laporan/create/{tanggal}', [App\Http\Controllers\LaporanController::class, 'create'])->name('createlaporan');
Route::get('/laporan/create/kegiatan/{tanggal}/{pegawai}', [App\Http\Controllers\LaporanController::class, 'tambahkegiatan'])->name('tambahkegiatan');

//Route Iva
Route::post('/updateCkp', 'CkpController@updateCkp');
Route::get('ckp', 'App\Http\Controllers\CkpController@index');
Route::get('/entrickp/{bulan}/{tahun}', 'App\Http\Controllers\CkpController@entrickp');
Route::get('/entrirealisasi/{id_ckp_prov}', 'App\Http\Controllers\CkpController@entrirealisasi');
Route::post('/editrealisasi/{bulan}/{tahun}/{id_ckp_prov}', 'App\Http\Controllers\CkpController@editrealisasi');
Route::get('/kirimckp/{bulan}/{tahun}/{id_ckp_prov}', 'App\Http\Controllers\CkpController@kirimckp');

Route::get('penilaianckp', 'App\Http\Controllers\PenilaianCkpController@index');
Route::get('/nilaickp/{bulan}/{tahun}', 'App\Http\Controllers\PenilaianCkpController@nilaickp');
Route::get('/entrinilai/{id_ckp_prov}', 'App\Http\Controllers\PenilaianCkpController@entrinilai');
Route::post('/editnilai/{bulan}/{tahun}/{id_ckp_prov}', 'App\Http\Controllers\PenilaianCkpController@editnilai');
Route::get('/kirimnilaickp/{bulan}/{tahun}/{id_ckp_prov}', 'App\Http\Controllers\PenilaianCkpController@kirimnilaickp');