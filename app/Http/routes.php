<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
	if (Auth::user()) {
		if (Auth::user()->status == 'Peternak') {
			return redirect('peternak/home');
		}else{
			return redirect('investor/home');
		}
	}else{
		return view('index');
	}
});
// Route::post('Mahasiswa/Berita/Tambah','BeritaController@store');


// Route::get('Mahasiswa/Solusi/Pilih/{id}','SolusiController@pilih');

Route::get('peternak/Ide','IdeController@index');
Route::get('peternak/miliksendiri','ternakController@miliksendiri');
Route::get('peternak/miliksemua','ternakController@miliksemua');
Route::get('peternak/lihatpengajuan','pengajuanController@showpeternak');
Route::get('peternak/lihatpengajuan/setujui/{id}','pengajuanController@ubahData');
Route::get('investor/lihatpengajuan/batal/{id}','pengajuanController@hapusData');
Route::get('investor/notifikasi','pengajuanController@showinvestornotif');
Route::post('Mahasiswa/Ide/Tambah','IdeController@store');

//--------------------Peternak
Route::get('peternak/home','HomeController@homepeternak');
Route::post('peternak/tambahternak/tambah','ternakController@store');
Route::get('peternak/tambahternak','ternakController@index');
Route::get('investor/home/sapiperah','ternakController@sapiperah');
Route::get('investor/home/lihatsemua','ternakController@lihatsemua');
Route::get('investor/home/sapisimental','ternakController@sapisimental');
Route::get('investor/home/sapibali','ternakController@sapibali');
//----------------------------komunitas
Route::post('Komunitas/Berita/Tambah','BeritaController@store');

Route::get('Komunitas/Solusi/Tambah/{id}','SolusiController@index');
Route::post('Komunitas/Solusi/{id}/Tambah','SolusiController@store');
Route::get('Komunitas/Solusi/Like/{id}','SolusiController@tambahLike');
Route::get('Komunitas/Solusi/Pilih/{id}','SolusiController@pilih');

Route::get('Komunitas/Ide','IdeController@index');
Route::post('Komunitas/Ide/Tambah','IdeController@store');

Route::get('Komunitas/Relawan/{id}/Tambah','RelawanController@index');

Route::get('Komunitas/Profil','UserController@index');
Route::post('Komunitas/Update','UserController@update');

Route::get('Komunitas/Solusi','SolusiController@show');
Route::get('Komunitas/Relawan','RelawanController@show');

Route::get('Mahasiswa/melengkapi','HomeController@melengkapi');
Route::get('Komunitas/home','HomeController@index');

//--INVESTOR
Route::get('investor/home','HomeController@homeinvestor');
Route::get('investor/pengajuan/{id}','pengajuanController@index');
Route::post('investor/pengajuan/{id}/tambah','pengajuanController@store');
Route::get('investor/lihatpengajuan','pengajuanController@showinvestor');
// Route::get('/register','UserController@register');
// Route::get('/Register/Komunitas')

Route::auth();
Route::get('/register','UserController@create');

Route::get('/home', 'HomeController@index');

Route::post('/user/avatar/upload','UserController@avatar');

