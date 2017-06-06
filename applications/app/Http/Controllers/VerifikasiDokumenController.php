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

        $getkegiatan = Kegiatan::join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
                                ->select('adik_kegiatan.id as id_kegiatan', 'adik_kegiatan.id_program', 'adik_kegiatan.nama_kegiatan', 'adik_program.nama_program')
                                ->get();


        foreach ($getkegiatan as $key) {
          $getitemkegiatan[] = ItemKegiatan::where('id_kegiatan', $key->id_kegiatan)->whereNotNull('realisasi_anggaran')->get();
        }

        foreach ($getitemkegiatan as $itemkegiatan) {
          foreach ($itemkegiatan as $item) {
            $coba = array();
            $coba['nama_item_kegiatan'] = $item->nama_item_kegiatan;
            $coba['no_rekening']  = $item->no_rekening;
            $coba['id_kegiatan'] = $item->id_kegiatan;
            $coba['nama_kegiatan'] = $item->kegiatan->nama_kegiatan;
            $coba['nama_program']  = $item->kegiatan->program->nama_program;

            $hasil[] = $coba;
          }
        }

        $hasil = collect($hasil);
        $getprogramkegiatan = $hasil->unique('id_kegiatan');

        return view('verifikasi-dokumen.index', compact('getprogramkegiatan', $getprogramkegiatan));
    }

    public function detail($no_rek)
    {
      $getdokumen = PencairanDokumen::where('no_rekening', '=', $no_rek)->first();

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

        return redirect()->route('verifikasi.detail', ['no_rek' => $getDok->no_rekening])->with('berhasil', 'Dokumen Berhasil di proses');
    }
}
