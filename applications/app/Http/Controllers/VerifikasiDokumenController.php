<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanPerBidang;
use App\Models\ItemKegiatan;
use App\Models\Kegiatan;
use App\Models\Pencairan;
use App\Models\PencairanDokumen;
use App\Models\ResumeKontrak;
use App\Models\Program;
use App\Models\PresentaseFisik;
use Auth;
use DB;
use Session;

class VerifikasiDokumenController extends Controller
{
    public function index()
    {
        $getDokumen = PencairanDokumen::get();

        return view('verifikasi-dokumen.index', compact('getDokumen'));
    }

    public function detail($id_item_kegiatan)
    {
      $getdokumen = PencairanDokumen::where('id', '=', $id_item_kegiatan)->first();

      if(!$getdokumen){
        return redirect()->route('verifikasi.index')->with('failed', 'File Dokumen Belum di Upload');
      }

      return view('verifikasi-dokumen.detail', compact('getdokumen'));
    }

    public function proses($id)
    {
        $getDok = PencairanDokumen::find($id);

        if(!$getDok){
          return view('error.404');
        }

        $getDok->flag_status = 1;
        $getDok->update();

        return redirect()->route('verifikasi.detail', ['no_rek' => $getDok->id])->with('berhasil', 'Dokumen Berhasil di proses');
    }
}
