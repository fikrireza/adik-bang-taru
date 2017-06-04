<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pencairan;
use Session;
use Auth;

class PencairanTerminController extends Controller
{
    public function store(Request $request)
    {
      $set = new Pencairan;
      $set->id_item_kegiatan = $request->id_item_kegiatan;
      $set->termin = $request->termin;
      $set->nilai = $request->nilai;
      $set->flag_status = 1;
      $set->id_aktor = Auth::user()->id;
      $set->save();

      Session::flash('success', 'Berhasil memasukkan data pencairan.');
      return redirect()->route('pencairan.progressbyitem', $request->id_item_kegiatan);
    }

    public function update(Request $request)
    {
      $set = Pencairan::find($request->id);
      $set->termin = $request->termin;
      $set->nilai = $request->nilai;
      $set->save();

      Session::flash('success', 'Berhasil memasukkan data pencairan.');
      return redirect()->route('pencairan.progressbyitem', $request->id_item_kegiatan);
    }

    public function bind($id)
    {
      $get = Pencairan::find($id);
      return $get;
    }
}
