<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencairan;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\ItemKegiatan;

class LaporanPencairanController extends Controller
{
    public function index()
    {
      $get = Pencairan::select('id_kegiatan', 'nama_kegiatan', 'no_rekening', 'nama_program', 'kode_kegiatan')
        ->join('adik_item_kegiatan', 'adik_item_kegiatan.id', 'adik_pencairan.id_item_kegiatan')
        ->join('adik_kegiatan', 'adik_kegiatan.id', 'adik_item_kegiatan.id_kegiatan')
        ->join('adik_program', 'adik_program.id', 'adik_kegiatan.id_program')
        ->groupby('id_kegiatan')
        ->groupby('nama_kegiatan')
        ->groupby('no_rekening')
        ->get();

      return view('laporan-pencairan.index')->with('datapencairan', $get);
    }

    public function print($id)
    {
      $getkegiatan = Kegiatan::find($id);
      $getitem = ItemKegiatan::where('id_kegiatan', $id)->get();

      $arriditem = array();
      foreach ($getitem as $key) {
        $arriditem[] = $key->id;
      }

      $getpencairan = Pencairan::wherein('id_item_kegiatan', $arriditem)->get();
      return $getpencairan;

      return view('laporan-pencairan.printout')->with('data', $get);
    }
}
