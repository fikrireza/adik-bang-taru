<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MasterBidang;
use App\Models\MasterKpa;
use App\Models\KegiatanKpa;
use App\Models\Program;
use App\Models\Kegiatan;

use Auth;
use Db;
use Validator;


class KPAController extends Controller
{
    public function indexMaster()
    {

      $getBidang = MasterBidang::get();
      $getKpa = MasterKpa::where('flag_status', 1)->get();

      return view('kpa.index', compact('getBidang', 'getKpa'));
    }

    public function storeMaster(Request $request)
    {
        $message = [
          'nip_sapk.required' => 'This field is required.',
          'id_bidang.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'nip_sapk' => 'required',
          'id_bidang' => 'required',
        ], $message);

        if($validator->fails()){
          return redirect()->route('kpa.index')->withErrors($validator)->withInput();
        }

        $pecah = explode('|',$request->nip_sapk);

        $save = new MasterKpa;
        $save->nip_sapk = $pecah[0];
        $save->nama = $pecah[1];
        $save->id_bidang = $request->id_bidang;
        $save->id_aktor = Auth::user()->id;
        $save->flag_status = 1;
        $save->save();

        return redirect()->route('kpa.index')->with('berhasil', 'Berhasil Menambahkan Data KPA');

    }

    public function ubahMaster($id)
    {
        $editKpa = MasterKpa::find($id);

        if(!$editKpa){
          return view('error.404');
        }

        $getBidang = MasterBidang::get();
        $getKpa = MasterKpa::where('flag_status', 1)->limit(100)->get();

        return view('kpa.index', compact('getBidang', 'getKpa', 'editKpa'));
    }

    public function editMaster(Request $request)
    {
        $message = [
          'nip_sapk.required' => 'This field is required.',
          'id_bidang.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'nip_sapk' => 'required',
          'id_bidang' => 'required',
        ], $message);

        if($validator->fails()){
          return redirect()->route('kpa.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
        }

        $pecah = explode('|',$request->nip_sapk);

        $update = MasterKpa::find($request->id);
        $update->nip_sapk = $pecah[0];
        $update->nama = $pecah[1];
        $update->id_bidang = $request->id_bidang;
        $update->id_aktor = Auth::user()->id;
        $update->flag_status = 1;
        $update->update();

        return redirect()->route('kpa.index')->with('berhasil', 'Berhasil Mengubah Data KPA');
    }


    public function indexKpa()
    {
        $getKegiatanKpa = KegiatanKpa::get();
        $getMasterKpa = MasterKpa::get();

        $kegiatan_kpa = KegiatanKpa::pluck('id_kegiatan')->all();
        $kegiatan = Kegiatan::whereNotIn('id', $kegiatan_kpa)->get();

        return view('kpa.kpa-kegiatan', compact('getKegiatanKpa', 'getMasterKpa', 'kegiatan'));
    }

    public function storeKegiatanKpa(Request $request)
    {
        $message = [
          'kpa.required' => 'This field is required.',
          'id_kegiatan.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'kpa' => 'required',
          'id_kegiatan' => 'required',
        ], $message);

        if($validator->fails()){
          return redirect()->route('kpa.setkegiatan')->withErrors($validator)->withInput();
        }

        $kegiatan = Kegiatan::find($request->id_kegiatan);

        $save = new KegiatanKpa;
        $save->kode_kegiatan = $kegiatan->kode_kegiatan;
        $save->id_kegiatan = $kegiatan->id;
        $save->id_program = $kegiatan->id_program;
        $save->id_master_kpa  = $request->kpa;
        $save->id_aktor = Auth::user()->id;
        $save->flag_status = 1;
        $save->save();

        return redirect()->route('kpa.index')->with('berhasil', 'Berhasil Mengubah Data KPA');
    }

    public function delete($id)
    {
        $set = MasterKpa::find($id);

        if(!$set){
          return view('error.404');
        }

        if ($set->flag_status == 1) {
          $set->flag_status = 0;
          $set->update();

          return redirect()->route('kpa.index')->with('berhasil', 'Berhasil Menghapus');
        }
    }

}
