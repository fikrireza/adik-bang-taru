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
Route::get('seleksi-kegiatan/proses/{id_kegiatan}/{id_bidang}', 'SeleksiKegiatanController@proses')->name('seleksi-kegiatan.proses');
Route::post('seleksi-kegiatan/find', 'SeleksiKegiatanController@findkegiatan')->name('seleksi-kegiatan.find');
Route::get('seleksi-kegiatan/destroy/{id}', 'SeleksiKegiatanController@destroy')->name('seleksi-kegiatan.delete');

Route::get('verifikasi-dokumen', 'VerifikasiDokumenController@index')->name('verifikasi.index');
Route::get('verifikasi-dokumen/detail', 'VerifikasiDokumenController@detail')->name('verifikasi.detail');

Route::post('authenticate', 'LoginController@dologin')->name('auth.login');
Route::get('logout', 'LoginController@dologout')->name('auth.logout');

Route::get('daftar-kegiatan', 'DaftarKegiatanController@index')->name('daftar-kegiatan.index');
Route::get('daftar-kegiatan/detail/{id}', 'DaftarKegiatanController@detail')->name('daftar-kegiatan.detail');

Route::get('pencairan-dana', 'PencairanDanaController@index')->name('pencairan.index');
Route::get('pencairan-dana/proses', 'PencairanDanaController@proses')->name('pencairan.proses');
Route::get('pencairan-dana/rincian-item', 'PencairanDanaController@rincian')->name('pencairan.rincian');
Route::get('pencairan-dana/progress-pencairan', 'PencairanDanaController@pencairan')->name('pencairan.progress');

// KPA
Route::get('kpa', 'KPAController@index')->name('kpa.index');
Route::post('kpa', 'KPAController@store')->name('kpa.store');
Route::get('kpa/{id}', 'KPAController@ubah')->name('kpa.ubah');
Route::post('kpa/edit', 'KPAController@edit')->name('kpa.edit');
Route::get('kpa/status/{id}', 'KPAController@status')->name('kpa.status');

Route::get('kpa-set-kegiatan', 'KPAController@setkegiatan')->name('kpa.setkegiatan');

Route::get('pptk', 'PPTKController@index')->name('pptk.index');
Route::get('pptk/set-kegiatan', 'PPTKController@setkegiatan')->name('pptk.setkegiatan');

Route::get('sync/apbd-bl', 'SyncController@apbdbl');
Route::get('sync/apbd-btl', 'SyncController@apbdbtl');
Route::get('sync/restructure', 'SyncController@restructure');

Route::get('bidang', 'BidangController@index')->name('bidang.index');
Route::post('bidang', 'BidangController@store')->name('bidang.store');
Route::get('bidang/bind/{id}', 'BidangController@bind')->name('bidang.bind');
Route::post('bidang/update', 'BidangController@update')->name('bidang.update');
Route::get('bidang/destroy/{id}', 'BidangController@destroy')->name('bidang.destroy');

Route::get('manajemen-akun', 'ManajemenAkunController@index')->name('akun.index');
Route::post('manajemen-akun', 'ManajemenAkunController@store')->name('akun.store');
Route::get('manajemen-akun/bind/{id}', 'ManajemenAkunController@bind')->name('akun.bind');
Route::post('manajemen-akun/update', 'ManajemenAkunController@update')->name('akun.update');
Route::get('manajemen-akun/destroy/{id}', 'ManajemenAkunController@destroy')->name('akun.destroy');
