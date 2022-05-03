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

// Route::get('/', 'HomeController@index');

Route::get('/', 'Auth\LoginController@index')->name('loginpage');
Route::post('/', 'Auth\LoginController@login')->name('login');

Route::get('/admin/dashboard', 'Admin\DashboardController@index')->name('dashboard');
Route::get('/admin/pihak_cerai', 'Admin\PihakCeraiController@index')->name('pihak_cerai');
Route::get('/admin/detailamar/{id}', 'Admin\PihakCeraiController@detail')->name('detailamar');
Route::get('/admin/getpengguna', 'Admin\PenggunaController@index')->name('getpengguna');
Route::post('/admin/addpengguna','Admin\PenggunaController@add')->name('addpengguna');
Route::get('/admin/pengguna/{id}', 'Admin\PenggunaController@hapus')->name('hapuspengguna');
Route::post('/admin/editputusan/{id}', 'Admin\PihakCeraiController@edit')->name('editputusan');
Route::get('/admin/exportputusan', 'Admin\PihakCeraiController@exportPutusan')->name('exportputusan');
Route::get('/admin/pihak/{id}','Admin\PihakCeraiController@hapus')->name('hapuspihak');
Route::post('/admin/editpengguna/{id}', 'Admin\PenggunaController@edit')->name('editpengguna');
Route::get('/admin/profil', 'Admin\PenggunaController@profil')->name('profilpengguna');
Route::post('/admin/profil', 'Admin\PenggunaController@editprofil')->name('editprofil');


Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

