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
Route::get('pencairan-dana/proses/{id}', 'PencairanDanaController@proses')->name('pencairan.proses');
Route::get('pencairan-dana/rincian-item/{no_rek}', 'PencairanDanaController@rincian')->name('pencairan.rincian');
Route::get('pencairan-dana/progress-pencairan-per-item/{id}', 'PencairanDanaController@pencairanbyitem')->name('pencairan.progressbyitem');
Route::get('pencairan-dana/ubah-flag-rincian/{no_rek}', 'PencairanDanaController@ubahflagrincian')->name('pencairan.ubahflagrincian');

Route::post('resume-kontrak', 'ResumeKontrakController@store')->name('resume.store');
Route::get('resume-kontrak/bind/{id}', 'ResumeKontrakController@bind')->name('resume.bind');

Route::post('pencairan-termin', 'PencairanTerminController@store')->name('pencairan-termin.store');
Route::post('pencairan-termin/update', 'PencairanTerminController@update')->name('pencairan-termin.update');
Route::get('pencairan-termin/bind/{id}', 'PencairanTerminController@bind')->name('pencairan-termin.bind');

Route::post('presentase-fisik/item', 'PresentaseFisikController@storefisikitem')->name('fisik.storefisikitem');
Route::post('presentase-fisik/kegiatan', 'PresentaseFisikController@storefisikkegiatan')->name('fisik.storefisikkegiatan');
Route::get('presentase-fisik/bind/{id}', 'PresentaseFisikController@bind')->name('fisik.bind');


//----- KPA
Route::get('kpa', 'KPAController@indexMaster')->name('kpa.index');
Route::post('kpa', 'KPAController@storeMaster')->name('kpa.store');
Route::get('kpa/{id}', 'KPAController@ubahMaster')->name('kpa.ubah');
Route::post('kpa/edit', 'KPAController@editMaster')->name('kpa.edit');
Route::get('kpa/status/{id}', 'KPAController@status')->name('kpa.status');
Route::get('kpa-set-kegiatan', 'KPAController@indexKpa')->name('kpa.setkegiatan');
Route::post('kpa-set-kegiatan', 'KPAController@storeKegiatanKpa')->name('kpa.storeKegiatanKpa');

//----- PPTK
Route::get('pptk', 'PPTKController@indexMaster')->name('pptk.index');
Route::post('pptk', 'PPTKController@storeMaster')->name('pptk.store');
Route::get('pptk/{id}', 'PPTKController@ubahMaster')->name('pptk.ubah');
Route::post('pptk/edit', 'PPTKController@editMaster')->name('pptk.edit');
Route::get('pptk-set-kegiatan', 'PPTKController@indexPptk')->name('pptk.setkegiatan');
Route::post('pptk-set-kegiatan', 'PPTKController@storeKegiatanKpa')->name('pptk.storeKegiatanPptk');

//----- PPKo
Route::get('ppko', 'PPKOController@indexMaster')->name('ppko.index');
Route::post('ppko', 'PPKOController@storeMaster')->name('ppko.store');
Route::get('ppko/{id}', 'PPKOController@ubahMaster')->name('ppko.ubah');
Route::post('ppko/edit', 'PPKOController@editMaster')->name('ppko.edit');
Route::get('ppko-set-kegiatan', 'PPKOController@indexPpko')->name('ppko.setkegiatan');
Route::post('ppko-set-kegiatan', 'PPKOController@storeKegiatanPpko')->name('ppko.storeKegiatanPpko');


//----- Sync Apbd
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
