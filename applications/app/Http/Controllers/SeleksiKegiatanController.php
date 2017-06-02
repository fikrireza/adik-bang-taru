<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\MasterBidang;
use App\Models\KegiatanPerBidang;

class SeleksiKegiatanController extends Controller
{
    public function seleksi()
    {
      $getkegiatanperbidang = KegiatanPerBidang::select('id_kegiatan')->get();

      $get = Kegiatan::select('*', 'adik_kegiatan.id as id_kegiatan')
        ->join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
        ->whereNotIn('adik_kegiatan.id', $getkegiatanperbidang)
        ->get();

      $bidang = MasterBidang::orderby('jenis_bidang')->get();

      return view('seleksi-kegiatan.seleksi-kegiatan')
        ->with('bidang', $bidang)
        ->with('data', $get);
    }

    public function proses($id_kegiatan, $id_bidang)
    {
      $set = new KegiatanPerBidang;
      $set->tanggal = date('Y-m-d');
      $set->id_kegiatan = $id_kegiatan;
      $set->id_bidang = $id_bidang;
      $set->save();

      return redirect()->route('seleksi-kegiatan.index')->with('success', 'Berhasil memindahkan data kegiatan ke bidang yang telah anda pilih.');
    }

    public function seleksiperbidang()
    {
      $get = MasterBidang::all();
      return view('seleksi-kegiatan.kegiatan-perbidang')->with('bidang', $get);
    }

    public function findkegiatan(Request $request)
    {
      $getperbidang = KegiatanPerBidang::select('*', 'adik_kegiatan_per_bidang.id as id')
        ->join('adik_kegiatan', 'adik_kegiatan.id', '=', 'adik_kegiatan_per_bidang.id_kegiatan')
        ->join('adik_program', 'adik_program.id', '=', 'adik_kegiatan.id_program')
        ->where('id_bidang', $request->id_bidang)
        ->get();

      $program = array();
      foreach ($getperbidang as $key) {
        if (!in_array($key->nama_program, $program)) {
          $program[] = $key->nama_program;
        }
      }

      $get = MasterBidang::all();

      return view('seleksi-kegiatan.kegiatan-perbidang')
        ->with('jumlahprogram', count($program))
        ->with('dataperbidang', $getperbidang)
        ->with('bidang', $get);
    }

    public function destroy($id)
    {
      $get = KegiatanPerBidang::find($id);
      $get->delete();

      return redirect()->route('seleksi-kegiatan.bidang')->with('success', 'Berhasil menghapus data kegiatan dari bidang.');
    }
}
