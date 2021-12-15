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

//laporan
Route::get('/dashboard/paa/laporan','App\Http\Controllers\paalaporanController@index');
Route::post('/dashboard/paa/laporan/store','App\Http\Controllers\paalaporanController@store');
Route::get('/dashboard/paa/laporan/edit/{id}','App\Http\Controllers\paalaporanController@edit');
Route::post('/dashboard/paa/laporan/update','App\Http\Controllers\paalaporanController@update');
Route::get('/dashboard/paa/laporan/hapus/{id}', 'App\Http\Controllers\paalaporanController@hapus');
Route::get('/dashboard/paa/laporan/restore', 'App\Http\Controllers\paalaporanController@restore');
Route::get('/dashboard/paa/laporan/restore/{id}', 'App\Http\Controllers\paalaporanController@back');

//pengajuan
Route::get('/dashboard/paa/pengajuan','App\Http\Controllers\paapengajuanController@index');
Route::post('/dashboard/paa/pengajuan/store','App\Http\Controllers\paapengajuanController@store');
Route::get('/dashboard/paa/pengajuan/edit/{id}','App\Http\Controllers\paapengajuanController@edit');
Route::post('/dashboard/paa/pengajuan/update','App\Http\Controllers\paapengajuanController@update');
Route::get('/dashboard/paa/pengajuan/hapus/{id}', 'App\Http\Controllers\paapengajuanController@hapus');
Route::get('/dashboard/paa/pengajuan/restore', 'App\Http\Controllers\paapengajuanController@restore');
Route::get('/dashboard/paa/pengajuan/restore/{id}', 'App\Http\Controllers\paapengajuanController@back');