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

Route::get('/dashboard/paa/sidang','App\Http\Controllers\paaSidangController@index');
Route::post('/dashboard/paa/sidang/store','App\Http\Controllers\paaSidangController@store');
Route::get('/dashboard/paa/sidang/edit/{id}','App\Http\Controllers\paaSidangController@edit');
Route::post('/dashboard/paa/sidang/update','App\Http\Controllers\paaSidangController@update');
Route::get('/dashboard/paa/sidang/hapus/{id}', 'App\Http\Controllers\paaSidangController@hapus');
Route::get('/dashboard/paa/sidang/restore', 'App\Http\Controllers\paaSidangController@restore');
Route::get('/dashboard/paa/sidang/restore/{id}', 'App\Http\Controllers\paaSidangController@back');

