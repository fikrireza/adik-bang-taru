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
use Auth;

class DashboardController extends Controller
{
    public function index()
    {
      if (Auth::user()->level==1) {
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

      } else if (Auth::user()->level==2) {
        // ---- TABEL DATA KEGIATAN ---
        $getkegiatanperbidang = KegiatanPerBidang::where('id_bidang', Auth::user()->id_bidang)->get();
        $id_kegiatan = array();
        foreach ($getkegiatanperbidang as $key) {
          $id_kegiatan[] = $key->id_kegiatan;
        }

        $getitem = ItemKegiatan::whereIn('id_kegiatan', $id_kegiatan)->get();
        $datakegiatan = array();
        foreach ($id_kegiatan as $key) {
          $rowkeg = array();
          $rowkeg['id'] = $key;
          $counttotal = 0;
          foreach ($getitem as $item) {
            if ($key==$item->id_kegiatan) {
              $counttotal+=$item->total;
            }
          }
          $rowkeg['total'] = $counttotal;
          $datakegiatan[] = $rowkeg;
        }
        // ---- END OF TABEL DATA KEGIATAN ---

        // ---- TOP WIDGET ----
        $getkegiatan = Kegiatan::whereIn('id', $id_kegiatan)->get();
        $id_program = array();
        foreach ($getkegiatan as $key) {
          if (!in_array($key->id_program, $id_program)) {
            $id_program[] = $key->id_program;
          }
        }

        $getakun = User::where('id_bidang', Auth::user()->id_bidang)->get();
        $id_akun = array();
        foreach ($getakun as $key) {
          $id_akun[] = $key->id;
        }

        $getbidang = MasterBidang::all();
        $getpencairan = Pencairan::whereIn('id_aktor', $id_akun)->get();

        $countprogram = count($id_program);
        $countkegiatan = count($getkegiatanperbidang);
        $countitem = count($getitem);
        $countuser = count($getakun);
        $countbidang = count($getbidang);
        $countpencairan = count($getpencairan);
        // ---- END OF TOP WIDGET ----

        // ---- CHART DATA ----
        $getcair = Pencairan::join('adik_item_kegiatan', 'adik_item_kegiatan.id', '=', 'adik_pencairan.id_item_kegiatan')->get();
        $kegiatancair = 0;
        foreach ($id_kegiatan as $keg) {
          foreach ($getcair as $cair) {
            if ($cair->id_kegiatan==$keg) {
              $kegiatancair++;
              break;
            }
          }
        }

        $rowdata['name'] = 'Kegiatan Belum Pencairan';
        $rowdata['y'] = $countkegiatan - $kegiatancair;
        $datachart[] = $rowdata;
        $rowdata['name'] = 'Kegiatan Telah Dicairkan';
        $rowdata['y'] = $kegiatancair;
        $datachart[] = $rowdata;
        $jsonchart = json_encode($datachart);
        // ---- END OF CHART DATA ----

        return view('dashboard.dashboard')
        ->with('countprogram', $countprogram)
        ->with('countkegiatan', $countkegiatan)
        ->with('countitem', $countitem)
        ->with('countuser', $countuser)
        ->with('countbidang', $countbidang)
        ->with('countpencairan', $countpencairan)
        ->with('chartdata', $jsonchart)
        ->with('getkegiatan', $getkegiatan)
        ->with('datakegiatan', $datakegiatan);
      }
    }
}
