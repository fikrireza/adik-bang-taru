<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MasterBidang;
use App\Models\MasterPptk;
use App\Models\KegiatanPptk;
use App\Models\Program;
use App\Models\Kegiatan;

use Auth;
use Db;
use Validator;

class PPTKController extends Controller
{
    public function indexMaster()
    {
        $getBidang = MasterBidang::get();
        $getPptk = MasterPptk::where('flag_status', 1)->get();

        return view('pptk.index', compact('getBidang', 'getPptk'));
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
          return redirect()->route('pptk.index')->withErrors($validator)->withInput();
        }

        $pecah = explode('|',$request->nip_sapk);

        $save = new MasterPptk;
        $save->nip_sapk = $pecah[0];
        $save->nama = $pecah[1];
        $save->id_bidang = $request->id_bidang;
        $save->id_aktor = Auth::user()->id;
        $save->flag_status = 1;
        $save->save();

        return redirect()->route('pptk.index')->with('berhasil', 'Berhasil Menambahkan Data PPTK');

    }

    public function ubahMaster($id)
    {
        $editPptk = MasterPptk::find($id);

        if(!$editPptk){
          return view('error.404');
        }

        $getBidang = MasterBidang::get();
        $getPptk = MasterPptk::where('flag_status', 1)->limit(100)->get();

        return view('pptk.index', compact('getBidang', 'getPptk', 'editPptk'));
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
          return redirect()->route('pptk.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
        }

        $pecah = explode('|',$request->nip_sapk);

        $update = MasterPptk::find($request->id);
        $update->nip_sapk = $pecah[0];
        $update->nama = $pecah[1];
        $update->id_bidang = $request->id_bidang;
        $update->id_aktor = Auth::user()->id;
        $update->flag_status = 1;
        $update->update();

        return redirect()->route('pptk.index')->with('berhasil', 'Berhasil Mengubah Data PPTK');
    }

    public function indexPptk()
    {
      $getKegiatanPptk = KegiatanPptk::get();
      $getMasterPptk = MasterPptk::get();

      $kegiatan_pptk = KegiatanPptk::pluck('id_kegiatan')->all();
      $kegiatan = Kegiatan::whereNotIn('id', $kegiatan_pptk)->get();

      return view('pptk.pptk-kegiatan', compact('getKegiatanPptk', 'getMasterPptk', 'kegiatan'));
    }

    public function storeKegiatanKpa(Request $request)
    {
        $message = [
          'pptk.required' => 'This field is required.',
          'id_kegiatan.required' => 'This field is required.',
        ];

        $validator = Validator::make($request->all(), [
          'pptk' => 'required',
          'id_kegiatan' => 'required',
        ], $message);

        if($validator->fails()){
          return redirect()->route('pptk.setkegiatan')->withErrors($validator)->withInput();
        }

        $kegiatan = Kegiatan::find($request->id_kegiatan);

        $save = new KegiatanPptk;
        $save->kode_kegiatan = $kegiatan->kode_kegiatan;
        $save->id_kegiatan = $kegiatan->id;
        $save->id_program = $kegiatan->id_program;
        $save->id_master_pptk  = $request->pptk;
        $save->id_aktor = Auth::user()->id;
        $save->flag_status = 1;
        $save->save();

        return redirect()->route('pptk.setkegiatan')->with('berhasil', 'Berhasil Mengubah Data PPTK');
    }

    public function delete($id)
    {
        $set = MasterPptk::find($id);

        if(!$set){
          return view('error.404');
        }

        if ($set->flag_status == 1) {
          $set->flag_status = 0;
          $set->update();

          return redirect()->route('pptk.index')->with('berhasil', 'Berhasil Menghapus');
        }
    }
}
