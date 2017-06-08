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

Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

// ---- SELEKSI KEGIATAN ----
Route::get('seleksi-kegiatan', 'SeleksiKegiatanController@seleksi')->name('seleksi-kegiatan.index');
Route::get('seleksi-kegiatan/bidang', 'SeleksiKegiatanController@seleksiperbidang')->name('seleksi-kegiatan.bidang');
Route::get('seleksi-kegiatan/proses/{id_kegiatan}/{id_bidang}', 'SeleksiKegiatanController@proses')->name('seleksi-kegiatan.proses');
Route::post('seleksi-kegiatan/find', 'SeleksiKegiatanController@findkegiatan')->name('seleksi-kegiatan.find');
Route::get('seleksi-kegiatan/destroy/{id}', 'SeleksiKegiatanController@destroy')->name('seleksi-kegiatan.delete');
// ---- END OF SELEKSI KEGIATAN ----

// ---- VERIFIKASI DOKUMEN ----
Route::get('verifikasi-dokumen', 'VerifikasiDokumenController@index')->name('verifikasi.index');
Route::get('verifikasi-dokumen/detail/{no_rek}', 'VerifikasiDokumenController@detail')->name('verifikasi.detail');
Route::get('verifikasi-dokumen/proses/{id}', 'VerifikasiDokumenController@proses')->name('verifikasi.proses');
// ---- END OF VERIFIKASI DOKUMEN ----

// ---- LOGIN AUTHENTICATION ----
Route::post('authenticate', 'LoginController@dologin')->name('auth.login');
Route::get('logout', 'LoginController@dologout')->name('auth.logout');
// ---- END OF LOGIN AUTHENTICATION ----

// ---- DAFTAR KEGIATAN ----
Route::get('daftar-kegiatan', 'DaftarKegiatanController@index')->name('daftar-kegiatan.index');
Route::get('daftar-kegiatan/detail/{id}', 'DaftarKegiatanController@detail')->name('daftar-kegiatan.detail');
// ---- END OF DAFTAR KEGIATAN ----

// ---- PENCAIRAN DANA ----
Route::get('pencairan-dana', 'PencairanDanaController@index')->name('pencairan.index');
Route::get('pencairan-dana/proses/{id}', 'PencairanDanaController@proses')->name('pencairan.proses');
Route::get('pencairan-dana/bind-item/{no_rek}/{id_keg}/{nama_item?}', 'PencairanDanaController@binditem')->name('pencairan.binditem')->where('nama_item', '(.*)');
Route::get('pencairan-dana/proses/dok/{no_rek}', 'PencairanDokumenController@getDok')->name('pencairan-dokumen.getDok');
Route::post('pencairan-dana/proses/dok', 'PencairanDokumenController@store')->name('pencairan-dokumen.store');
Route::get('pencairan-dana/rincian-item/{no_rek}/{id_keg}/{nama_item?}', 'PencairanDanaController@rincian')->name('pencairan.rincian')->where('nama_item', '(.*)');
Route::get('pencairan-dana/progress-pencairan-per-item/{id}', 'PencairanDanaController@pencairanbyitem')->name('pencairan.progressbyitem');
Route::get('pencairan-dana/ubah-flag-rincian/{no_rek}/{id_keg}/{nama_item?}', 'PencairanDanaController@ubahflagrincian')->name('pencairan.ubahflagrincian')->where('nama_item', '(.*)');
// ---- END OF PENCAIRAN DANA ----

// ---- RESUME KONTRAK ----
Route::post('resume-kontrak', 'ResumeKontrakController@store')->name('resume.store');
Route::get('resume-kontrak/bind/{id}', 'ResumeKontrakController@bind')->name('resume.bind');
// ---- END OF RESUME KONTRAK ----

// ---- PENCAIRAN PER TERMIN ----
Route::post('pencairan-termin', 'PencairanTerminController@store')->name('pencairan-termin.store');
Route::post('pencairan-termin/update', 'PencairanTerminController@update')->name('pencairan-termin.update');
Route::get('pencairan-termin/bind/{id}', 'PencairanTerminController@bind')->name('pencairan-termin.bind');
// ---- END OF PENCAIRAN PER TERMIN ----

// ---- PRESENTASE FISIK ----
Route::post('presentase-fisik/item', 'PresentaseFisikController@storefisikitem')->name('fisik.storefisikitem');
Route::post('presentase-fisik/kegiatan', 'PresentaseFisikController@storefisikkegiatan')->name('fisik.storefisikkegiatan');
Route::get('presentase-fisik/bind/{id}', 'PresentaseFisikController@bind')->name('fisik.bind');
// ---- END OF PRESENTASE FISIK ----

// ---- KPA ----
Route::get('kpa', 'KPAController@indexMaster')->name('kpa.index');
Route::post('kpa', 'KPAController@storeMaster')->name('kpa.store');
Route::get('kpa/{id}', 'KPAController@ubahMaster')->name('kpa.ubah');
Route::post('kpa/edit', 'KPAController@editMaster')->name('kpa.edit');
Route::get('kpa/status/{id}', 'KPAController@status')->name('kpa.status');
Route::get('kpa/delete/{id}', 'KPAController@delete')->name('kpa.delete');
Route::get('kpa-set-kegiatan', 'KPAController@indexKpa')->name('kpa.setkegiatan');
Route::post('kpa-set-kegiatan', 'KPAController@storeKegiatanKpa')->name('kpa.storeKegiatanKpa');
// ---- END OF KPA ----

// ---- PPTK ----
Route::get('pptk', 'PPTKController@indexMaster')->name('pptk.index');
Route::post('pptk', 'PPTKController@storeMaster')->name('pptk.store');
Route::get('pptk/{id}', 'PPTKController@ubahMaster')->name('pptk.ubah');
Route::post('pptk/edit', 'PPTKController@editMaster')->name('pptk.edit');
Route::get('pptk/delete/{id}', 'PPTKController@delete')->name('pptk.delete');
Route::get('pptk-set-kegiatan', 'PPTKController@indexPptk')->name('pptk.setkegiatan');
Route::post('pptk-set-kegiatan', 'PPTKController@storeKegiatanKpa')->name('pptk.storeKegiatanPptk');
// ---- END OF PPTK ----

// ---- PPKo ----
Route::get('ppko', 'PPKOController@indexMaster')->name('ppko.index');
Route::post('ppko', 'PPKOController@storeMaster')->name('ppko.store');
Route::get('ppko/{id}', 'PPKOController@ubahMaster')->name('ppko.ubah');
Route::post('ppko/edit', 'PPKOController@editMaster')->name('ppko.edit');
Route::get('ppko/delete/{id}', 'PPKOController@delete')->name('ppko.delete');
Route::get('ppko-set-kegiatan', 'PPKOController@indexPpko')->name('ppko.setkegiatan');
Route::post('ppko-set-kegiatan', 'PPKOController@storeKegiatanPpko')->name('ppko.storeKegiatanPpko');
// ---- END OF PPKo ----

// ---- SYNC SIMDA DB ----
Route::get('sync/apbd-bl', 'SyncController@apbdbl');
Route::get('sync/apbd-btl', 'SyncController@apbdbtl');
Route::get('sync/restructure', 'SyncController@restructure');
Route::get('sync/restructure-realisasi', 'SyncController@restructure_realisasi');
// ---- END OF SYNC SIMDA DB ----

// ---- MANAJEMEN BIDANG ----
Route::get('bidang', 'BidangController@index')->name('bidang.index');
Route::post('bidang', 'BidangController@store')->name('bidang.store');
Route::get('bidang/bind/{id}', 'BidangController@bind')->name('bidang.bind');
Route::post('bidang/update', 'BidangController@update')->name('bidang.update');
Route::get('bidang/destroy/{id}', 'BidangController@destroy')->name('bidang.destroy');
// ---- END OF MANAJEMEN BIDANG ----

// ---- MANAJEMEN AKUN ----
Route::get('manajemen-akun', 'ManajemenAkunController@index')->name('akun.index');
Route::post('manajemen-akun', 'ManajemenAkunController@store')->name('akun.store');
Route::get('manajemen-akun/bind/{id}', 'ManajemenAkunController@bind')->name('akun.bind');
Route::post('manajemen-akun/update', 'ManajemenAkunController@update')->name('akun.update');
Route::get('manajemen-akun/destroy/{id}', 'ManajemenAkunController@destroy')->name('akun.destroy');
// ---- END OF MANAJEMEN AKUN ----

// ---- LAPORAN PENCAIRAN ----
Route::get('laporan-pencairan', 'LaporanPencairanController@index')->name('laporan-pencairan.index');
Route::get('laporan-pencairan/print/{id_keg}', 'LaporanPencairanController@print')->name('laporan-pencairan.print');
// ---- END OF LAPORAN PENCAIRAN ----
