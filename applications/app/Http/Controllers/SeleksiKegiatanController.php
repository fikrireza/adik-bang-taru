<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\MasterBidang;

class SeleksiKegiatanController extends Controller
{
    public function seleksi()
    {
      $get = Kegiatan::join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')->get();
      $bidang = MasterBidang::orderby('jenis_bidang')->get();
      return view('seleksi-kegiatan.seleksi-kegiatan')
        ->with('bidang', $bidang)
        ->with('data', $get);
    }

    public function proses($id)
    {
      
    }

    public function seleksiperbidang()
    {
      return view('seleksi-kegiatan.kegiatan-perbidang');
    }
}
