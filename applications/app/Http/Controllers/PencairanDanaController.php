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
use App\Models\PencairanDokumen;
use Carbon\Carbon;
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
      $getitem = ItemKegiatan::select('id_kegiatan', 'nama_item_kegiatan', 'no_rekening', 'flag_rincian_item', 'realisasi_anggaran', DB::raw('sum(total) as total'))
      ->where('id_kegiatan', $id)
      ->groupby('nama_item_kegiatan')
      ->groupby('no_rekening')
      ->groupby('flag_rincian_item')
      ->groupby('realisasi_anggaran')
      ->groupby('id_kegiatan')
      ->get();

      $getkegiatan = Kegiatan::select('adik_kegiatan.*', 'adik_kegiatan.id as id_kegiatan', 'adik_program.id as id_program', 'adik_program.nama_program', 'adik_program.kode_program')
        ->join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
        ->where('adik_kegiatan.id', $id)->first();

      $getiditemkegiatan = ItemKegiatan::select('id', 'nama_item_kegiatan', 'no_rekening')->get();

      $getfisik = PresentaseFisik::whereNotNull('no_rekening_kegiatan')->get();

      $getrealisasi = RealisasiAnggaran::select('kode_kegiatan', DB::raw('sum(nilai) as realisasi_anggaran'))
        ->where('adik_realisasi_anggaran.kode_kegiatan', $getkegiatan->kode_kegiatan)
        ->groupby('kode_kegiatan')
        ->first();

      $jumlahanggaran = 0;
      $realisasibyinput = 0;
      foreach ($getitem as $key) {
        $jumlahanggaran = $jumlahanggaran + $key->total;
        $realisasibyinput = $realisasibyinput + $key->realisasi_anggaran;
      }

      return view('pencairan-dana.proses')
        ->with('id_kegiatan', $id)
        ->with('getkegiatan', $getkegiatan)
        ->with('getfisik', $getfisik)
        ->with('getrealisasi', $getrealisasi)
        ->with('getiditemkegiatan', $getiditemkegiatan)
        ->with('realisasibyinput', $realisasibyinput)
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

    public function rincian($no_rek, $id_keg, $nama_item)
    {
      $get = ItemKegiatan::where('no_rekening', $no_rek)
        ->where('nama_item_kegiatan', $nama_item)
        ->where('id_kegiatan', $id_keg)
        ->get();

      $getfisik = PresentaseFisik::whereNotNull('id_item_kegiatan')->get();

      $getpencairan = Pencairan::select('id_item_kegiatan', DB::raw('sum(nilai) as nilai'))->groupby('id_item_kegiatan')->get();

      return view('pencairan-dana.rincian')
        ->with('getfisik', $getfisik)
        ->with('getpencairan', $getpencairan)
        ->with('no_rek', $no_rek)
        ->with('id_keg', $id_keg)
        ->with('nama_item', $nama_item)
        ->with('dataitem', $get);
    }

    public function pencairanbyitem($id_item)
    {
      $getkontrak = ResumeKontrak::where('id_item_kegiatan', $id_item)->first();
      $gettermin = Pencairan::where('id_item_kegiatan', $id_item)->get();
      $getfisik = PresentaseFisik::where('id_item_kegiatan', $id_item)->first();
      $getDokumen = PencairanDokumen::where('id_item_kegiatan', $id_item)->first();

      if (count($getkontrak)!=0) {
        $start = Carbon::parse($getkontrak->jangka_waktu_awal);
        $end = Carbon::parse($getkontrak->jangka_waktu_akhir);
        $days = $end->diffInDays($start);
      } else {
        $days = "-1";
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
        ->with('getDokumen', $getDokumen)
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
