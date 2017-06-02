<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanPerBidang;
use App\Models\ItemKegiatan;
use App\Models\Kegiatan;
use Auth;

class DaftarKegiatanController extends Controller
{
    public function index()
    {
      $getperbidang = KegiatanPerBidang::select('*', 'adik_kegiatan_per_bidang.id as id')
        ->join('adik_kegiatan', 'adik_kegiatan.id', '=', 'adik_kegiatan_per_bidang.id_kegiatan')
        ->join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
        ->where('id_bidang', Auth::user()->id_bidang)
        ->get();

      return view('daftar-kegiatan.index')->with('getperbidang', $getperbidang);
    }

    public function detail($id)
    {
      $getitem = ItemKegiatan::where('id_kegiatan', $id)->get();
      $getkegiatan = Kegiatan::join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
        ->where('adik_kegiatan.id', $id)->first();

      $jumlahanggaran = 0;
      foreach ($getitem as $key) {
        $jumlahanggaran = $jumlahanggaran + $key->total;
      }

      return view('daftar-kegiatan.detail')
        ->with('jumlahanggaran', $jumlahanggaran)
        ->with('getkegiatan', $getkegiatan)
        ->with('getitem', $getitem);
    }
}
