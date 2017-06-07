<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanPerBidang;
use App\Models\ItemKegiatan;
use App\Models\Kegiatan;
use App\Models\Pencairan;
use App\Models\ResumeKontrak;
use App\Models\PresentaseFisik;
use App\Models\RealisasiAnggaran;
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

      $getkegiatan = Kegiatan::select('adik_kegiatan.*', 'adik_kegiatan.id as id_kegiatan', 'adik_program.id as id_program', 'adik_program.nama_program', 'adik_program.kode_program')
        ->join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
        ->where('adik_kegiatan.id', $id)->first();

      $getiditemkegiatan = ItemKegiatan::select('id', 'nama_item_kegiatan', 'no_rekening')->get();

      $getfisik = PresentaseFisik::whereNotNull('no_rekening_kegiatan')->get();

      $getrealisasi = RealisasiAnggaran::select('kode_item', DB::raw('sum(nilai) as realisasi_anggaran'))
        ->where('adik_realisasi_anggaran.kode_kegiatan', $getkegiatan->kode_kegiatan)
        ->groupby('kode_item')
        ->get();

      $jumlahanggaran = 0;
      foreach ($getitem as $key) {
        $jumlahanggaran = $jumlahanggaran + $key->total;
      }

      return view('pencairan-dana.proses')
        ->with('id_kegiatan', $id)
        ->with('getkegiatan', $getkegiatan)
        ->with('getfisik', $getfisik)
        ->with('getrealisasi', $getrealisasi)
        ->with('getiditemkegiatan', $getiditemkegiatan)
        ->with('jumlahanggaran', $jumlahanggaran)
        ->with('getitem', $getitem);
    }

    public function ubahflagrincian($no_rek, $id_keg, $nama_item)
    {
      $set = ItemKegiatan::where('no_rekening', $no_rek)
        ->where('id_kegiatan', $id_keg)
        ->where('nama_item_kegiatan', $nama_item)
        ->first();

      $flag = 2;
      if ($set->flag_rincian_item==0) {
        $flag = 1;
      } else {
        $flag = 0;
      }

      $setall = ItemKegiatan::where('no_rekening', $no_rek)
        ->where('id_kegiatan', $id_keg)
        ->where('nama_item_kegiatan', $nama_item)
        ->update(array('flag_rincian_item'=>$flag));

      return redirect()->route('pencairan.proses', $set->id_kegiatan)->with('success', 'Berhasil mengganti status kontrak.');
    }

    public function rincian($no_rek)
    {
      $get = ItemKegiatan::where('no_rekening', $no_rek)->get();
      $getfisik = PresentaseFisik::whereNotNull('id_item_kegiatan')->get();
      $getpencairan = Pencairan::select('id_item_kegiatan', DB::raw('sum(nilai) as nilai'))->groupby('id_item_kegiatan')->get();

      return view('pencairan-dana.rincian')
        ->with('getfisik', $getfisik)
        ->with('getpencairan', $getpencairan)
        ->with('dataitem', $get);
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

    public function binditem($no_rek, $id_keg, $nama_item)
    {
      $get = ItemKegiatan::where('no_rekening', $no_rek)
        ->where('id_kegiatan', $id_keg)
        ->where('nama_item_kegiatan', $nama_item)
        ->get();
      return $get;
    }
}
