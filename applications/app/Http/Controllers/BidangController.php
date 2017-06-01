<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBidang;
use App\Models\User;
use Validator;

class BidangController extends Controller
{
    public function index()
    {
      $get = MasterBidang::all();
      return view('bidang.index')->with('data', $get);
    }

    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'nama_bidang' => 'required',
        'jenis_bidang' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect()->route('bidang.index')
          ->withErrors($validator)
          ->withInput();
      }

      $set = new MasterBidang;
      $set->nama_bidang = $request->nama_bidang;
      $set->jenis_bidang = $request->jenis_bidang;
      $set->keterangan = $request->keterangan;
      $set->save();

      return redirect()->route('bidang.index')->with('success', 'Berhasil memasukkan data bidang baru.');
    }

    public function bind($id)
    {
      $get = MasterBidang::find($id);
      return $get;
    }

    public function update(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'id' => 'required',
        'nama_bidang' => 'required',
        'jenis_bidang' => 'required',
      ]);

      if ($validator->fails()) {
        return redirect()->route('bidang.index')
          ->withErrors($validator)
          ->withInput();
      }

      $set = MasterBidang::find($request->id);
      $set->nama_bidang = $request->nama_bidang;
      $set->jenis_bidang = $request->jenis_bidang;
      $set->keterangan = $request->keterangan;
      $set->save();

      return redirect()->route('bidang.index')->with('success', 'Berhasil mengubah data bidang.');
    }

    public function destroy($id)
    {
      $check = User::where('id_bidang', $id)->count();
      if ($check==0) {
        $drop = MasterBidang::find($id);
        $drop->delete();

        return redirect()->route('bidang.index')->with('success', 'Berhasil menghapus data bidang.');
      } else {
        return redirect()->route('bidang.index')->with('failed', 'Data tidak bisa dihapus karena beberapa data user telah bergantung terhadap bidang tersebut.');
      }
    }
}
