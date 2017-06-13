<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ResumeKontrak;
use App\Models\ItemKegiatan;
use App\Models\Kegiatan;
use App\Models\PencairanDokumen;
use Session;

use Auth;
use PDF;

class ResumeKontrakController extends Controller
{
    public function store(Request $request)
    {
      $getitem = ItemKegiatan::where('id', $request->id_item)->first();

      $check = ResumeKontrak::where('id_item_kegiatan', $request->id_item)->count();
      if ($check==0) {
        $set = new ResumeKontrak;
      } else {
        $set = ResumeKontrak::where('id_item_kegiatan', $request->id_item)->first();
      }
      $set->id_item_kegiatan = $request->id_item;
      $set->no_rekening = $getitem->no_rekening;
      $set->no_dpa = $request->no_dpa;
      $set->tanggal_dpa = $request->tanggal_dpa;
      $set->no_kontrak = $request->no_kontrak;
      $set->tanggal_kontrak = $request->tanggal_kontrak;
      $set->nama_perusahaan = $request->nama_perusahaan;
      $set->alamat_perusahaan = $request->alamat_perusahaan;
      $set->nilai_kontrak = $request->nilai_kontrak;
      $set->no_ba_kemajuan = $request->no_ba_kemajuan;
      $set->tanggal_ba_kemajuan = $request->tanggal_ba_kemajuan;
      $set->no_ba_pembayaran = $request->no_ba_pembayaran;
      $set->tanggal_ba_pembayaran = $request->tanggal_ba_pembayaran;
      $set->no_ba_penyelesaian = $request->no_ba_penyelesaian;
      $set->tanggal_ba_penyelesaian = $request->tanggal_ba_penyelesaian;
      $set->no_ba_serah_terima = $request->no_ba_serah_terima;
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

      $date = date('Y-m-d');
      $rand = rand(1000,9999);


      $getkontrak = ResumeKontrak::where('id_item_kegiatan', $request->id_item)->first();
      if (count($getkontrak)!=0) {
        $date1 = $getkontrak->jangka_waktu_awal;
        $date2 = $getkontrak->jangka_waktu_akhir;

        $diff = abs(strtotime($date2) - strtotime($date1));

        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
      } else {
        $days = -1;
      }

      $dok_res_kontrak = 'Resume Kontrak - '.$date.' - '.$request->no_dpa.' - '.$rand;

      // Excel::create($dok_res_kontrak, function($excel) use($dok_res_kontrak,$request, $date, $days) {
      //   $excel->sheet('Resume Kontrak - '.$date, function($sheet) use($request,$date, $days) {
      //     $sheet->loadView('pencairan-dana.resumeKontrak')
      //             ->with('id_item', $request->id_item)
      //             ->with('daysjangkawaktu', $days)
      //             ->with('datakontrak', $request);
      //   });
      // // })->store("pdf", $path = false, $returnInfo = false);
      // })->store("pdf", storage_path('..\..\dokumen\pencairan'));

      view()->share('id_item', $request->id_item);
      view()->share('daysjangkawaktu', $days);
      view()->share('datakontrak', $request);

      $pdf = PDF::loadView('pencairan-dana.resumeKontrak')->save( 'dokumen/pencairan/'.$dok_res_kontrak.'.pdf' );


      $check2 = PencairanDokumen::where('id_item_kegiatan', $request->id_item)->count();
      if ($check2==0) {
        $saveDok = new PencairanDokumen;
      } else {
        $saveDok = PencairanDokumen::where('id_item_kegiatan', $request->id_item)->first();
      }
      $saveDok->id_item_kegiatan = $request->id_item;
      $saveDok->dok_res_kontrak = $dok_res_kontrak.'.pdf';
      $saveDok->id_aktor = Auth::user()->id;
      $saveDok->flag_status = 0;
      $saveDok->save();


      Session::flash('success', 'Berhasil mengupdate resume kontrak.');
      return redirect()->route('pencairan.progressbyitem', $request->id_item);
    }

    public function bind($id)
    {
      $get = ResumeKontrak::where('id_item_kegiatan', $id)->first();
      return $get;
    }
}
