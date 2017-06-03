<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResumeKontrak;

class ResumeKontrakController extends Controller
{
    public function store(Request $request)
    {
      $set = new ResumeKontrak;
      $set->no_dpa = $request->no_dpa;
      $set->tanggal_dpa = $request->tanggal_dpa;
      $set->no_kontrak = $request->no_kontrak;
      $set->tanggal_kontrak = $request->tanggal_kontrak;
      $set->nama_perusahaan = $request->nama_perusahaan;
      $set->alamat_perusahaan = $request->alamat_perusahaan;
      $set->nilai_kontrak = $request->nilai_kontrak;
      $set->nomor_ba_kemajuan = $request->no_ba_kemajuan;
      $set->tanggal_ba_kemajuan = $request->tanggal_ba_kemajuan;
      $set->nomor_ba_pembayaran = $request->no_ba_pembayaran;
      $set->tanggal_ba_penyelesaian = $request->tanggal_ba_penyelesaian;
      $set->nomor_ba_serah_terima = $request->no_ba_serah_terima;
      $set->tanggal_ba_serah_terima = $request->tanggal_ba_serah_terima;
      $set->uraian_volume = $request->uraian_volume;
      $set->cara_pembayaran = $request->cara_pembayaran;
      $set->jangka_waktu_awal = $request->jangka_waktu_awal;
      $set->jangka_waktu_akhir = $request->jangka_waktu_akhir;
      $set->tanggal_penyelesaian = $request->tanggal_penyelesaian;
      $set->ketentuan_sanksi = $request->ketentuan_sanksi;
      $set->npwp = $request->npwp;
      $set->no_rekening_perusahaan = $request->no_rekening_perusahaan;
      $set->save();

      return "Ok";
    }
}
