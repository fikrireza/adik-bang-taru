<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanPerBidang;
use App\Models\ItemKegiatan;
use App\Models\Kegiatan;
use Auth;

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
      $getitem = ItemKegiatan::where('id_kegiatan', $id)->get();
      $getkegiatan = Kegiatan::join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
        ->where('adik_kegiatan.id', $id)->first();

      $jumlahanggaran = 0;
      foreach ($getitem as $key) {
        $jumlahanggaran = $jumlahanggaran + $key->total;
      }

      return view('pencairan-dana.proses')
        ->with('getkegiatan', $getkegiatan)
        ->with('jumlahanggaran', $jumlahanggaran)
        ->with('getitem', $getitem);
    }

    public function rincian()
    {
      return view('pencairan-dana.rincian');
    }

    public function pencairan()
    {
      return view('pencairan-dana.pencairan');
    }
}
