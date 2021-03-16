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

Route::get('/', 'RedirectIfAuthenticatedController');
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/petugas','PetugasController');
    Route::resource('/pegawai','PegawaiController');
    Route::resource('/pelanggan','PelangganController');
    Route::resource('/golongan','GolonganController');
    Route::resource('/tagihan','TagihanController');
    Route::resource('/user','UserController');
    Route::resource('/totaltagihan','TotalTagihanController');
});

