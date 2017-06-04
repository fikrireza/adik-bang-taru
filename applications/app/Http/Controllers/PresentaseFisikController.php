<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PresentaseFisik;
use Session;

class PresentaseFisikController extends Controller
{
    public function storefisikitem(Request $request)
    {
      $check = PresentaseFisik::where('id_item_kegiatan', $request->id_item_kegiatan)->get();
      if (count($check)==0) {
        $set = new PresentaseFisik;
      } else {
        $set = PresentaseFisik::where('id_item_kegiatan', $request->id_item_kegiatan)->first();
      }
      $set->id_item_kegiatan = $request->id_item_kegiatan;
      $set->nilai = $request->nilai;
      $set->save();

      Session::put('success', 'Berhasil mengupdate presentase realisasi fisik.');
      return redirect()->route('pencairan.progressbyitem', $request->id_item_kegiatan);
    }

    public function bind($id)
    {
      $get = PresentaseFisik::find($id);
      return $get;
    }
}
