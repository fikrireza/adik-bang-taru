<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;

class SeleksiKegiatanController extends Controller
{
    public function seleksi()
    {
      $get = Kegiatan::join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')->get();
      return view('seleksi-kegiatan.seleksi-kegiatan')->with('data', $get);
    }

    public function seleksiperbidang()
    {
      return view('seleksi-kegiatan.kegiatan-perbidang');
    }
}
