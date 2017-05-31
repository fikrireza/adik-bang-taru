<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SimdaAPBDBL;
use App\Models\SimdaAPBDBTL;

class SyncController extends Controller
{
    public function apbdbl()
    {
      ini_set('max_execution_time', 300);
      $client = new \GuzzleHttp\Client();
      $res = $client->request('GET', 'http://localhost/api-simda/public/api/simda-2017/apbd-bl/get-by-skpd-name/dinas tata ruang dan bangunan');
      $result = json_decode($res->getbody());
      // dd($result);
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
}
