<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeleksiKegiatanController extends Controller
{
    public function seleksi()
    {
      return view('seleksi-kegiatan.seleksi-kegiatan');
    }

    public function seleksiperbidang()
    {
      return view('seleksi-kegiatan.kegiatan-perbidang');
    }
}
