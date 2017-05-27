<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiDokumenController extends Controller
{
    public function index()
    {
      return view('verifikasi-dokumen.index');
    }

    public function detail()
    {
      return view('verifikasi-dokumen.detail');
    }
}
