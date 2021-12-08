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
    return view('dashboard.paa');
});

Route::get('/paa', 'App\Http\Controllers\paaController@index');
Route::post('/paa/store','App\Http\Controllers\paaController@store');
Route::get('/paa/edit/{id}','App\Http\Controllers\paaController@edit');
Route::post('/paa/update','App\Http\Controllers\paaController@update');
Route::get('/paa/hapus/{id}', 'App\Http\Controllers\paaController@hapus');
Route::get('/paa/restore', 'App\Http\Controllers\paaController@restore');
Route::get('/paa/restore/{id}', 'App\Http\Controllers\paaController@back');
