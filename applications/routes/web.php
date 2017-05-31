<?php

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
    return view('login.login');
})->name('login.index');

Route::get('dashboard', function () {
    return view('dashboard.dashboard');
})->name('dashboard.index');

Route::get('seleksi-kegiatan', 'SeleksiKegiatanController@seleksi')->name('seleksi-kegiatan.index');
Route::get('seleksi-kegiatan/bidang', 'SeleksiKegiatanController@seleksiperbidang')->name('seleksi-kegiatan.bidang');

Route::get('manajemen-akun', 'ManajemenAkunController@index')->name('akun.index');

Route::get('verifikasi-dokumen', 'VerifikasiDokumenController@index')->name('verifikasi.index');
Route::get('verifikasi-dokumen/detail', 'VerifikasiDokumenController@detail')->name('verifikasi.detail');

Route::post('authenticate', 'LoginController@dologin')->name('auth.login');
Route::get('logout', 'LoginController@dologout')->name('auth.logout');

Route::get('daftar-kegiatan', 'DaftarKegiatanController@index')->name('daftar-kegiatan.index');
Route::get('daftar-kegiatan/detail', 'DaftarKegiatanController@detail')->name('daftar-kegiatan.detail');

Route::get('pencairan-dana', 'PencairanDanaController@index')->name('pencairan.index');
Route::get('pencairan-dana/proses', 'PencairanDanaController@proses')->name('pencairan.proses');
Route::get('pencairan-dana/rincian-item', 'PencairanDanaController@rincian')->name('pencairan.rincian');
Route::get('pencairan-dana/progress-pencairan', 'PencairanDanaController@pencairan')->name('pencairan.progress');

Route::get('kpa', 'KPAController@index')->name('kpa.index');
Route::get('kpa/set-kegiatan', 'KPAController@setkegiatan')->name('kpa.setkegiatan');

Route::get('pptk', 'PPTKController@index')->name('pptk.index');
Route::get('pptk/set-kegiatan', 'PPTKController@setkegiatan')->name('pptk.setkegiatan');
