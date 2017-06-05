<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MasterBidang;
use App\Models\MasterPpko;
use App\Models\KegiatanPpko;
use App\Models\Program;
use App\Models\Kegiatan;

use Auth;
use Db;
use Validator;

class PPKOController extends Controller
{
  public function indexMaster()
  {
      $getBidang = MasterBidang::get();
      $getPpko = MasterPpko::where('flag_status', 1)->get();

      return view('ppko.index', compact('getBidang', 'getPpko'));
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
        return redirect()->route('ppko.index')->withErrors($validator)->withInput();
      }

      $pecah = explode('|',$request->nip_sapk);

      $save = new MasterPpko;
      $save->nip_sapk = $pecah[0];
      $save->nama = $pecah[1];
      $save->id_bidang = $request->id_bidang;
      $save->id_aktor = Auth::user()->id;
      $save->flag_status = 1;
      $save->save();

      return redirect()->route('ppko.index')->with('berhasil', 'Berhasil Menambahkan Data PPTK');

  }

  public function ubahMaster($id)
  {
      $editPpko = MasterPpko::find($id);

      if(!$editPpko){
        return view('error.404');
      }

      $getBidang = MasterBidang::get();
      $getPpko = MasterPpko::where('flag_status', 1)->limit(100)->get();

      return view('ppko.index', compact('getBidang', 'getPpko', 'editPpko'));
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
        return redirect()->route('ppko.ubah', ['id' => $request->id])->withErrors($validator)->withInput();
      }

      $pecah = explode('|',$request->nip_sapk);

      $update = MasterPpko::find($request->id);
      $update->nip_sapk = $pecah[0];
      $update->nama = $pecah[1];
      $update->id_bidang = $request->id_bidang;
      $update->id_aktor = Auth::user()->id;
      $update->flag_status = 1;
      $update->update();

      return redirect()->route('ppko.index')->with('berhasil', 'Berhasil Mengubah Data PPTK');
  }

  public function indexPpko()
  {
    $getKegiatanPpko = KegiatanPpko::get();
    $getMasterPpko = MasterPpko::get();

    $kegiatan_ppko = KegiatanPpko::pluck('id_kegiatan')->all();
    $kegiatan = Kegiatan::whereNotIn('id', $kegiatan_ppko)->get();

    return view('ppko.ppko-kegiatan', compact('getKegiatanPpko', 'getMasterPpko', 'kegiatan'));
  }

  public function storeKegiatanPpko(Request $request)
  {
      $message = [
        'ppko.required' => 'This field is required.',
        'id_kegiatan.required' => 'This field is required.',
      ];

      $validator = Validator::make($request->all(), [
        'ppko' => 'required',
        'id_kegiatan' => 'required',
      ], $message);

      if($validator->fails()){
        return redirect()->route('ppko.setkegiatan')->withErrors($validator)->withInput();
      }

      $kegiatan = Kegiatan::find($request->id_kegiatan);

      $save = new KegiatanPpko;
      $save->kode_kegiatan = $kegiatan->kode_kegiatan;
      $save->id_kegiatan = $kegiatan->id;
      $save->id_program = $kegiatan->id_program;
      $save->id_master_ppko  = $request->ppko;
      $save->id_aktor = Auth::user()->id;
      $save->flag_status = 1;
      $save->save();

      return redirect()->route('ppko.setkegiatan')->with('berhasil', 'Berhasil Mengubah Data PPTK');
  }

  public function delete($id)
  {
      $set = MasterPpko::find($id);

      if(!$set){
        return view('error.404');
      }

      if ($set->flag_status == 1) {
        $set->flag_status = 0;
        $set->update();

        return redirect()->route('ppko.index')->with('berhasil', 'Berhasil Menghapus');
      }
  }
}
