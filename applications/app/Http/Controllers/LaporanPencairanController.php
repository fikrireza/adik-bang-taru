<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencairan;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\ItemKegiatan;
use App\Models\ResumeKontrak;
use App\Models\PresentaseFisik;
use DB;
use PDF;
use Auth;

class LaporanPencairanController extends Controller
{
    public function index()
    {
      $get = Pencairan::select('adik_item_kegiatan.id_kegiatan', 'nama_kegiatan', 'nama_program', 'kode_kegiatan')
        ->join('adik_item_kegiatan', 'adik_item_kegiatan.id', 'adik_pencairan.id_item_kegiatan')
        ->join('adik_kegiatan', 'adik_kegiatan.id', 'adik_item_kegiatan.id_kegiatan')
        ->join('adik_program', 'adik_program.id', 'adik_kegiatan.id_program')
        ->join('adik_kegiatan_per_bidang', 'adik_kegiatan.id', 'adik_kegiatan_per_bidang.id_kegiatan')
        ->where('adik_kegiatan_per_bidang.id_bidang', Auth::user()->id_bidang)
        ->groupby('adik_item_kegiatan.id_kegiatan')
        ->groupby('nama_kegiatan')
        ->groupby('nama_program')
        ->groupby('kode_kegiatan')
        ->get();

      return view('laporan-pencairan.index')->with('datapencairan', $get);
    }

    public function printcair($id)
    {
      $getitem = ItemKegiatan::where('id_kegiatan', $id)->get();
      $id_item = array();
      $no_rek = array();
      foreach ($getitem as $key) {
        $id_item[] = $key->id;
        if (!in_array($key->no_rekening, $no_rek)) {
          $no_rek[] = $key->no_rekening;
        }
      }

      $getcair = Pencairan::select('id_item_kegiatan', 'no_rek', 'nama_item_kegiatan', 'id_kegiatan', DB::RAW('sum(nilai) as nilai'))
        ->groupby('id_item_kegiatan')
        ->groupby('no_rek')
        ->groupby('nama_item_kegiatan')
        ->groupby('id_kegiatan')
        ->orderby('id_item_kegiatan')
        ->get();

      $datacair = array();
      foreach ($getcair as $key) {
        if (in_array($key->id_item_kegiatan, $id_item) || in_array($key->no_rek, $no_rek)) {
          $datacair[] = $key;
        }
      }

      $getkegiatan = Kegiatan::find($id);
      $getprogram = Program::find($getkegiatan->id_program);
      $getsumitem = Pencairan::select('id_item_kegiatan', DB::RAW('sum(nilai) as nilai'))->groupby('id_item_kegiatan')->get();
      $getresume = ResumeKontrak::all();
      $getfisik = PresentaseFisik::all();

      view()->share('getsumitem', $getsumitem);
      view()->share('getitem', $getitem);
      view()->share('getresume', $getresume);
      view()->share('getfisik', $getfisik);
      view()->share('getkegiatan', $getkegiatan);
      view()->share('getprogram', $getprogram);
      view()->share('datacair', $datacair);

      $pdf = PDF::loadView('laporan-pencairan.printout')->setPaper('a4', 'landscape');
      return $pdf->download('laporan-pencairan.pdf');

      return view('laporan-pencairan.printout')
        ->with('getsumitem', $getsumitem)
        ->with('getitem', $getitem)
        ->with('getresume', $getresume)
        ->with('getfisik', $getfisik)
        ->with('getkegiatan', $getkegiatan)
        ->with('getprogram', $getprogram)
        ->with('datacair', $datacair);
    }
}
