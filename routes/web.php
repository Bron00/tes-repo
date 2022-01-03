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

Route::get('/', function () {
    return view('landing');
});
Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard/paa',function(){
    return view('layout.paa');
});

//sidang
Route::get('/dashboard/paa/sidang','App\Http\Controllers\paaSidangController@index');
Route::post('/dashboard/paa/sidang/store','App\Http\Controllers\paaSidangController@store');
Route::get('/dashboard/paa/sidang/edit/{id}','App\Http\Controllers\paaSidangController@edit');
Route::post('/dashboard/paa/sidang/update','App\Http\Controllers\paaSidangController@update');
Route::get('/dashboard/paa/sidang/hapus/{id}', 'App\Http\Controllers\paaSidangController@hapus');
Route::get('/dashboard/paa/sidang/restore', 'App\Http\Controllers\paaSidangController@restore');
Route::get('/dashboard/paa/sidang/restore/{id}', 'App\Http\Controllers\paaSidangController@back');
Route::post('/dashboard/paa/sidang/download','App\Http\Controllers\paaSidangController@download');
Route::get('/dashboard/paa/sidang/rekap','App\Http\Controllers\paaSidangController@rekap');


//laporan
Route::get('/dashboard/paa/laporan','App\Http\Controllers\paalaporanController@index');
Route::get('/dashboard/paa/laporan/edit/{id}','App\Http\Controllers\paalaporanController@edit');
Route::post('/dashboard/paa/laporan/update','App\Http\Controllers\paalaporanController@update');
Route::post('/dashboard/paa/laporan/download','App\Http\Controllers\paalaporanController@download');


//pengajuan
Route::get('/dashboard/paa/pengajuan','App\Http\Controllers\paapengajuanController@index');
Route::post('/dashboard/paa/pengajuan/store','App\Http\Controllers\paapengajuanController@store');
Route::get('/dashboard/paa/pengajuan/edit/{id}','App\Http\Controllers\paapengajuanController@edit');
Route::post('/dashboard/paa/pengajuan/update','App\Http\Controllers\paapengajuanController@update');
Route::get('/dashboard/paa/pengajuan/hapus/{id}', 'App\Http\Controllers\paapengajuanController@hapus');
Route::get('/dashboard/paa/pengajuan/restore', 'App\Http\Controllers\paapengajuanController@restore');
Route::get('/dashboard/paa/pengajuan/restore/{id}', 'App\Http\Controllers\paapengajuanController@back');

//paa
Route::get('/dashboard/paa/paa','App\Http\Controllers\paapaaController@index');
Route::post('/dashboard/paa/paa/store','App\Http\Controllers\paapaaController@store');
Route::get('/dashboard/paa/paa/edit/{id}','App\Http\Controllers\paapaaController@edit');
Route::post('/dashboard/paa/paa/update','App\Http\Controllers\paapaaController@update');
Route::get('/dashboard/paa/paa/hapus/{id}', 'App\Http\Controllers\paapaaController@hapus');
Route::get('/dashboard/paa/paa/restore', 'App\Http\Controllers\paapaaController@restore');
Route::get('/dashboard/paa/paa/restore/{id}', 'App\Http\Controllers\paapaaController@back');

//mahasiswa
Route::get('/dashboard/paa/mahasiswa','App\Http\Controllers\paamahasiswaController@index');
Route::post('/dashboard/paa/mahasiswa/store','App\Http\Controllers\paamahasiswaController@store');
Route::get('/dashboard/paa/mahasiswa/edit/{id}','App\Http\Controllers\paamahasiswaController@edit');
Route::post('/dashboard/paa/mahasiswa/update','App\Http\Controllers\paamahasiswaController@update');
Route::get('/dashboard/paa/mahasiswa/hapus/{id}', 'App\Http\Controllers\paamahasiswaController@hapus');
Route::get('/dashboard/paa/mahasiswa/restore', 'App\Http\Controllers\paamahasiswaController@restore');
Route::get('/dashboard/paa/mahasiswa/restore/{id}', 'App\Http\Controllers\paamahasiswaController@back');

//dosen
Route::get('/dashboard/paa/dosen','App\Http\Controllers\paadosenController@index');
Route::post('/dashboard/paa/dosen/store','App\Http\Controllers\paadosenController@store');
Route::get('/dashboard/paa/dosen/edit/{id}','App\Http\Controllers\paadosenController@edit');
Route::post('/dashboard/paa/dosen/update','App\Http\Controllers\paadosenController@update');
Route::get('/dashboard/paa/dosen/hapus/{id}', 'App\Http\Controllers\paadosenController@hapus');
Route::get('/dashboard/paa/dosen/restore', 'App\Http\Controllers\paadosenController@restore');
Route::get('/dashboard/paa/dosen/restore/{id}', 'App\Http\Controllers\paadosenController@back');