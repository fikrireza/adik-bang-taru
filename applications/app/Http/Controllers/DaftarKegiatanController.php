<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DaftarKegiatanController extends Controller
{
    public function index()
    {
      return view('daftar-kegiatan.index');
    }

    public function detail()
    {
      return view('daftar-kegiatan.detail');
    }
}
