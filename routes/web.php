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

Route::get('/tes',function(){
    $path = public_path('\tes.pdf');
    $file = file_get_contents('tes.pdf',$path);

   $tes = \Wablass::send_message([
        'phone'=>'08987499383',
        'message'=>'tes',
        //'caption'=>'tes',
    ]);

    dd($tes);
});

Route::get('/', 'RedirectIfAuthenticatedController');
Auth::routes();
Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    // Route::resource('/petugas','PetugasController');
    Route::resource('/pegawai','PegawaiController');
    Route::resource('/pelanggan','PelangganController');
    Route::post('/pelanggan/{pelanggan}/qrcode','PelangganController@qrcode');
    Route::resource('/golongan','GolonganController');
    Route::resource('/tagihan','TagihanController');
    Route::resource('/user','UserController');
    Route::resource('/totaltagihan','TotalTagihanController');
    Route::get('/totaltagihan-pdf/{idTotalTagihan}','TotalTagihanController@generatePDF');
    Route::get('/tagihanwa/{idTotalTagihan}','TotalTagihanController@sentToWhatsapp');
    Route::get('/totalTagihan/{id}','TotalTagihanController@delete');
});

