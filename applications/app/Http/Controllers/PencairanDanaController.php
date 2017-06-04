<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanPerBidang;
use App\Models\ItemKegiatan;
use App\Models\Kegiatan;
use App\Models\Pencairan;
use App\Models\ResumeKontrak;
use App\Models\PresentaseFisik;
use Auth;
use DB;
use Session;

class PencairanDanaController extends Controller
{
    public function index()
    {
      $getperbidang = KegiatanPerBidang::select('*', 'adik_kegiatan_per_bidang.id as id')
        ->join('adik_kegiatan', 'adik_kegiatan.id', '=', 'adik_kegiatan_per_bidang.id_kegiatan')
        ->join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
        ->where('id_bidang', Auth::user()->id_bidang)
        ->get();

      return view('pencairan-dana.index')->with('getperbidang', $getperbidang);
    }

    public function proses($id)
    {
      $getitem = ItemKegiatan::select('nama_item_kegiatan', 'no_rekening', 'flag_rincian_item', 'realisasi_anggaran', DB::raw('sum(total) as total'))
      ->where('id_kegiatan', $id)
      ->groupby('nama_item_kegiatan')
      ->groupby('no_rekening')
      ->groupby('flag_rincian_item')
      ->groupby('realisasi_anggaran')
      ->get();

      $getkegiatan = Kegiatan::join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
        ->select('adik_kegiatan.*', 'adik_program.id as id_program', 'adik_program.nama_program', 'adik_program.kode_program')
        ->where('adik_kegiatan.id', $id)->first();

      $getfisik = PresentaseFisik::whereNotNull('no_rekening_kegiatan')->get();

      $jumlahanggaran = 0;
      foreach ($getitem as $key) {
        $jumlahanggaran = $jumlahanggaran + $key->total;
      }

      return view('pencairan-dana.proses')
        ->with('id_kegiatan', $id)
        ->with('getkegiatan', $getkegiatan)
        ->with('getfisik', $getfisik)
        ->with('jumlahanggaran', $jumlahanggaran)
        ->with('getitem', $getitem);
    }

    public function ubahflagrincian($no_rek)
    {
      $set = ItemKegiatan::where('no_rekening', $no_rek)->first();
      $flag = 2;
      if ($set->flag_rincian_item==0) {
        $flag = 1;
      } else {
        $flag = 0;
      }

      $setall = ItemKegiatan::where('no_rekening', $no_rek)->update(array('flag_rincian_item'=>$flag));

      return redirect()->route('pencairan.proses', $set->id_kegiatan)->with('success', 'Berhasil mengganti status kontrak.');
    }

    public function rincian($no_rek)
    {
      $get = ItemKegiatan::where('no_rekening', $no_rek)->get();
      return view('pencairan-dana.rincian')->with('dataitem', $get);
    }

    public function pencairanbyitem($id_item)
    {
      $getkontrak = ResumeKontrak::where('id_item_kegiatan', $id_item)->first();
      $gettermin = Pencairan::where('id_item_kegiatan', $id_item)->get();
      $getfisik = PresentaseFisik::where('id_item_kegiatan', $id_item)->first();

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

      $successmsg = null;
      if (Session::has('success')) {
        $successmsg = Session::get('success');
      }

      return view('pencairan-dana.pencairan')
        ->with('id_item', $id_item)
        ->with('success', $successmsg)
        ->with('gettermin', $gettermin)
        ->with('getfisik', $getfisik)
        ->with('daysjangkawaktu', $days)
        ->with('datakontrak', $getkontrak);
    }
}
