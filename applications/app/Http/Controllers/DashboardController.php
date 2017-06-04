<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBidang;
use App\Models\User;
use App\Models\KegiatanPerBidang;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\ItemKegiatan;
use App\Models\Pencairan;

class DashboardController extends Controller
{
    public function index()
    {
      // ---- TABEL DATA BIDANG ---
      $getbidang = MasterBidang::all();
      $getuser = User::all();
      $getkegiatanperbidang = KegiatanPerBidang::all();

      $datarow = array();
      foreach ($getbidang as $bidang) {
        $row = array();
        $row['nama_bidang'] = $bidang->nama_bidang;
        $countuser = 0;
        foreach ($getuser as $usr) {
          if ($usr->id_bidang==$bidang->id) {
            $countuser++;
          }
        }
        $row['jumlah_akun'] = $countuser;
        $countkeg = 0;
        foreach ($getkegiatanperbidang as $gkb) {
          if ($gkb->id_bidang==$bidang->id) {
            $countkeg++;
          }
        }
        $row['jumlah_kegiatan'] = $countkeg;
        $datarow[] = $row;
      }
      // ---- END OF TABEL DATA BIDANG ---

      // ---- TOP WIDGET ----
      $countprogram = Program::count();
      $countkegiatan = Kegiatan::count();
      $countitem = ItemKegiatan::count();
      $countuser = count($getuser);
      $countbidang = count($getbidang);
      $countpencairan = Pencairan::count();
      // ---- END OF TOP WIDGET ----

      // ---- CHART DATA ----
      $datachart = array();
      $rowchart = array();
      $datachart['name'] = 'Belum di seleksi';
      $datachart['y'] = $countkegiatan - count($getkegiatanperbidang);
      $rowchart[] = $datachart;
      foreach ($getbidang as $bidang) {
        $datachart = array();
        $datachart['name'] = $bidang->nama_bidang;
        $countdata = 0;
        foreach ($getkegiatanperbidang as $gkb) {
          if ($gkb->id_bidang==$bidang->id) {
            $countdata++;
          }
        }
        $datachart['y'] = $countdata;
        $rowchart[] = $datachart;
      }
      $jsonchart = json_encode($rowchart);
      // ---- END OF CHART DATA ----

      return view('dashboard.dashboard')
        ->with('countprogram', $countprogram)
        ->with('countkegiatan', $countkegiatan)
        ->with('countitem', $countitem)
        ->with('countuser', $countuser)
        ->with('countbidang', $countbidang)
        ->with('countpencairan', $countpencairan)
        ->with('chartdata', $jsonchart)
        ->with('databidang', $datarow);
    }
}
