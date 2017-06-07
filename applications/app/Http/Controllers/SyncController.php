<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimdaAPBDBL;
use App\Models\SimdaAPBDBTL;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\ItemKegiatan;
use App\Models\SimdaRealisasiAnggaran;
use App\Models\RealisasiAnggaran;
use DB;

class SyncController extends Controller
{
    public function apbdbl()
    {
      ini_set('max_execution_time', 300);
      $client = new \GuzzleHttp\Client();
      $res = $client->request('GET', 'http://localhost/api-simda/public/api/simda-2017/apbd-bl/get-by-skpd-name/dinas tata ruang dan bangunan');
      $result = json_decode($res->getbody());

      foreach ($result->data as $key) {
        $set = new SimdaAPBDBL;
        $set->tahun = $key->Tahun;
        $set->kd_urusan = $key->Kd_Urusan;
        $set->kd_bidang = $key->Kd_Bidang;
        $set->kd_unit = $key->Kd_Unit;
        $set->kd_sub = $key->Kd_Sub;
        $set->kd_prog = $key->Kd_Prog;
        $set->ket_program = $key->Ket_Program;
        $set->nm_sub_unit = $key->Nm_Sub_Unit;
        $set->ket_kegiatan = $key->Ket_Kegiatan;
        $set->kd_keg = $key->Kd_Keg;
        $set->kd_rek_1 = $key->Kd_Rek_1;
        $set->kd_rek_2 = $key->Kd_Rek_2;
        $set->kd_rek_3 = $key->Kd_Rek_3;
        $set->kd_rek_4 = $key->Kd_Rek_4;
        $set->kd_rek_5 = $key->Kd_Rek_5;
        $set->keterangan = $key->Keterangan;
        $set->sat_1 = $key->Sat_1;
        $set->nilai_1 = $key->Nilai_1;
        $set->sat_2 = $key->Sat_2;
        $set->nilai_2 = $key->Nilai_2;
        $set->sat_3 = $key->Sat_3;
        $set->nilai_3 = $key->Nilai_3;
        $set->nilai_rp = $key->Nilai_Rp;
        $set->total = $key->Total;
        $set->expr1 = $key->Expr1;
        $set->save();
      }

      return "Done!";
    }

    public function apbdbtl()
    {
      ini_set('max_execution_time', 300);
      $client = new \GuzzleHttp\Client();
      $res = $client->request('GET', 'http://localhost/api-simda/public/api/simda-2017/apbd-btl/get-by-skpd-name/dinas tata ruang dan bangunan');
      $result = json_decode($res->getbody());

      foreach ($result->data as $key) {
        $set = new SimdaAPBDBTL;
        $set->tahun = $key->Tahun;
        $set->kd_urusan = $key->Kd_Urusan;
        $set->kd_bidang = $key->Kd_Bidang;
        $set->kd_unit = $key->Kd_Unit;
        $set->kd_sub = $key->Kd_Sub;
        $set->kd_prog = $key->Kd_Prog;
        $set->ket_program = $key->Ket_Program;
        $set->nm_sub_unit = $key->Nm_Sub_Unit;
        $set->ket_kegiatan = $key->Ket_Kegiatan;
        $set->kd_keg = $key->Kd_Keg;
        $set->kd_rek_1 = $key->Kd_Rek_1;
        $set->kd_rek_2 = $key->Kd_Rek_2;
        $set->kd_rek_3 = $key->Kd_Rek_3;
        $set->kd_rek_4 = $key->Kd_Rek_4;
        $set->kd_rek_5 = $key->Kd_Rek_5;
        $set->keterangan = $key->Keterangan;
        $set->sat_1 = $key->Sat_1;
        $set->nilai_1 = $key->Nilai_1;
        $set->sat_2 = $key->Sat_2;
        $set->nilai_2 = $key->Nilai_2;
        $set->sat_3 = $key->Sat_3;
        $set->nilai_3 = $key->Nilai_3;
        $set->nilai_rp = $key->Nilai_Rp;
        $set->total = $key->Total;
        $set->expr1 = $key->Expr1;
        $set->save();
      }

      return "Done!";
    }

    public function restructure()
    {
      // ---- INSERT UNIQUE PRORAM FROM SIMDA TO ADIK ----
      $distinctprogram = SimdaAPBDBL::select(DB::raw('distinct ket_program'), 'kd_urusan', 'kd_bidang', 'kd_prog')->get();

      $availableprogram = Program::all();
      $arr_program = array();
      if (count($availableprogram)!=0) {
        foreach ($availableprogram as $key) {
          $arr_program[] = $key->nama_program;
        }
      }

      foreach ($distinctprogram as $key) {
        if (count($availableprogram)!=0) {
          if (!in_array($key->ket_program, $arr_program)) {
            $bidang_code = 0;
            if ($key->kd_bidang<10) {
              $bidang_code = "0".$key->kd_bidang;
            } else {
              $bidang_code = $key->kd_bidang;
            }
            $program_code = 0;
            if ($key->kd_prog<10) {
              $program_code = "0".$key->kd_prog;
            } else {
              $program_code = $key->kd_prog;
            }
            $rek_program = $key->kd_urusan.".".$bidang_code.".".$key->kd_urusan.".".$bidang_code.".".$program_code;

            $program = new Program;
            $program->nama_program = $key->ket_program;
            $program->kode_program = $rek_program;
            $program->save();
          }
        } else {
          $bidang_code = 0;
          if ($key->kd_bidang<10) {
            $bidang_code = "0".$key->kd_bidang;
          } else {
            $bidang_code = $key->kd_bidang;
          }
          $program_code = 0;
          if ($key->kd_prog<10) {
            $program_code = "0".$key->kd_prog;
          } else {
            $program_code = $key->kd_prog;
          }
          $rek_program = $key->kd_urusan.".".$bidang_code.".".$key->kd_urusan.".".$bidang_code.".".$program_code;

          $program = new Program;
          $program->nama_program = $key->ket_program;
          $program->kode_program = $rek_program;
          $program->save();
        }
      }
      // ---- END OF INSERT UNIQUE PRORAM FROM SIMDA TO ADIK ----

      // ---- INSERT UNIQUE KEGIATAN FROM SIMDA TO ADIK ----
      $distinctkegiatan = SimdaAPBDBL::select('ket_program', 'ket_kegiatan', 'kd_keg')
        ->groupby('ket_program')
        ->groupby('ket_kegiatan')
        ->groupby('kd_keg')
        ->get();

      $availablekegiatan = Kegiatan::all();
      $arr_kegiatan = array();
      if (count($availablekegiatan)!=0) {
        foreach ($availablekegiatan as $key) {
          $arr_kegiatan[] = $key->nama_kegiatan;
        }
      }

      $availableprogram = Program::all();
      foreach ($distinctkegiatan as $key) {
        if (count($availablekegiatan)!=0) {
          if (!in_array($key->ket_kegiatan, $arr_kegiatan)) {
            $idprog = 0;
            $norek_prog = 0;
            foreach ($availableprogram as $prg) {
              if ($key->ket_program == $prg->nama_program) {
                $idprog = $prg->id;
                $norek_prog = $prg->kode_program;
                break;
              }
            }
            $norek_keg = 0;
            if ($key->kd_keg < 10) {
              $norek_keg = "00".$key->kd_keg;
            } else if ($key->kd_keg < 100) {
              $norek_keg = "0".$key->kd_keg;
            } else if ($key->kd_keg < 1000) {
              $norek_keg = $key->kd_keg;
            }
            $kode_kegiatan = $norek_prog.".".$norek_keg;

            $kegiatan = new Kegiatan;
            $kegiatan->nama_kegiatan = $key->ket_kegiatan;
            $kegiatan->id_program = $idprog;
            $kegiatan->kode_kegiatan = $kode_kegiatan;
            $kegiatan->save();
          }
        } else {
          $idprog = 0;
          $norek_prog = 0;
          foreach ($availableprogram as $prg) {
            if ($key->ket_program == $prg->nama_program) {
              $idprog = $prg->id;
              $norek_prog = $prg->kode_program;
              break;
            }
          }
          $norek_keg = 0;
          if ($key->kd_keg < 10) {
            $norek_keg = "00".$key->kd_keg;
          } else if ($key->kd_keg < 100) {
            $norek_keg = "0".$key->kd_keg;
          } else if ($key->kd_keg < 1000) {
            $norek_keg = $key->kd_keg;
          }
          $kode_kegiatan = $norek_prog.".".$norek_keg;

          $kegiatan = new Kegiatan;
          $kegiatan->nama_kegiatan = $key->ket_kegiatan;
          $kegiatan->id_program = $idprog;
          $kegiatan->kode_kegiatan = $kode_kegiatan;
          $kegiatan->save();
        }
      }
      //---- END OF INSERT UNIQUE KEGIATAN FROM SIMDA TO ADIK ----

      //---- INSERT ITEM KEGIATAN FROM SIMDA TO ADIK ----
      $getallitem = SimdaAPBDBL::select('ket_kegiatan', 'kd_rek_1', 'kd_rek_2', 'kd_rek_3', 'kd_rek_4', 'kd_rek_5', 'keterangan', 'sat_1', 'nilai_1', 'sat_2', 'nilai_2', 'sat_3', 'nilai_3', 'nilai_rp', 'total', 'expr1')->get();
      // return count($getallitem);
      ItemKegiatan::query()->truncate();

      $availablekegiatan = Kegiatan::all();
      foreach ($getallitem as $key) {
        $rek_4 = 0;
        if ($key->kd_rek_4 < 10) {
          $rek_4 = "0".$key->kd_rek_4;
        } else {
          $rek_4 = $key->kd_rek_4;
        }
        $rek_5 = 0;
        if ($key->kd_rek_5 < 10) {
          $rek_5 = "00".$key->kd_rek_5;
        } else if ($key->kd_rek_5 < 100) {
          $rek_5 = "0".$key->kd_rek_5;
        } else if ($key->kd_rek_5 < 1000) {
          $rek_5 = $key->kd_rek_5;
        }
        $no_rekening = $key->kd_rek_1.".".$key->kd_rek_2.".".$key->kd_rek_3.".".$rek_4.".".$rek_5;
        $idkeg = 0;
        foreach ($availablekegiatan as $kgtn) {
          if ($key->ket_kegiatan == $kgtn->nama_kegiatan) {
            $idkeg = $kgtn->id;
            break;
          }
        }
        $item = new ItemKegiatan;
        $item->nama_item_kegiatan = trim($key->keterangan);
        $item->no_rekening = $no_rekening;
        $item->satuan_1 = $key->sat_1;
        $item->nilai_1 = $key->nilai_1;
        $item->satuan_2 = $key->sat_2;
        $item->nilai_2 = $key->nilai_2;
        $item->satuan_3 = $key->sat_3;
        $item->nilai_3 = $key->nilai_3;
        $item->nilai_rp = $key->nilai_rp;
        $item->total = $key->total;
        $item->expr1 = $key->expr1;
        $item->id_kegiatan = $idkeg;
        $item->save();
      }
      //---- END OF INSERT ITEM KEGIATAN FROM SIMDA TO ADIK ----

      return "Done!";
    }

    public function restructure_realisasi()
    {
      $get = SimdaRealisasiAnggaran::all();

      foreach ($get as $key) {
        $bidang_code = 0;
        if ($key->kd_bidang<10) {
          $bidang_code = "0".$key->kd_bidang;
        } else {
          $bidang_code = $key->kd_bidang;
        }
        $program_code = 0;
        if ($key->kd_prog<10) {
          $program_code = "0".$key->kd_prog;
        } else {
          $program_code = $key->kd_prog;
        }
        $rek_program = $key->kd_urusan.".".$bidang_code.".".$key->kd_urusan.".".$bidang_code.".".$program_code;

        $norek_keg = 0;
        if ($key->kd_keg < 10) {
          $norek_keg = "00".$key->kd_keg;
        } else if ($key->kd_keg < 100) {
          $norek_keg = "0".$key->kd_keg;
        } else if ($key->kd_keg < 1000) {
          $norek_keg = $key->kd_keg;
        }
        $rek_kegiatan =  $rek_program.".".$norek_keg;

        $rek_4 = 0;
        if ($key->kd_rek_4 < 10) {
          $rek_4 = "0".$key->kd_rek_4;
        } else {
          $rek_4 = $key->kd_rek_4;
        }
        $rek_5 = 0;
        if ($key->kd_rek_5 < 10) {
          $rek_5 = "00".$key->kd_rek_5;
        } else if ($key->kd_rek_5 < 100) {
          $rek_5 = "0".$key->kd_rek_5;
        } else if ($key->kd_rek_5 < 1000) {
          $rek_5 = $key->kd_rek_5;
        }
        $rek_item = $key->kd_rek_1.".".$key->kd_rek_2.".".$key->kd_rek_3.".".$rek_4.".".$rek_5;

        $tw_exp = explode('/', $key->no_spd);
        $tw = (int) $tw_exp[0];

        $set = new RealisasiAnggaran;
        $set->kode_program = $rek_program;
        $set->kode_kegiatan = $rek_kegiatan;
        $set->kode_item = $rek_item;
        $set->no_spd = $key->no_spd;
        $set->triwulan = $tw;
        $set->tahun = $key->tahun;
        $set->nilai = $key->nilai;
        $set->save();
      }

      return "Done!";
    }
}
