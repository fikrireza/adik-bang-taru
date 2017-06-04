<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\MasterBidang;
use Validator;
use Hash;

class ManajemenAkunController extends Controller
{
  public function index()
  {
    $get = User::select('*', 'users.id as id_user')->join('master_bidang', 'master_bidang.id', '=', 'users.id_bidang')->get();
    $bidang = MasterBidang::all();
    return view('manajemen-akun.index')
      ->with('data', $get)
      ->with('bidang', $bidang);
  }

  public function store(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',
      'id_bidang' => 'required',
      'level' => 'required',
    ]);

    if ($validator->fails()) {
      return redirect()->route('akun.index')
        ->withErrors($validator)
        ->withInput();
    }

    $set = new User;
    $set->name = $request->name;
    $set->email = $request->email;
    $set->password = Hash::make($request->password);
    $set->id_bidang = $request->id_bidang;
    $set->level = $request->level;
    $set->save();

    return redirect()->route('akun.index')->with('success', 'Berhasil memasukkan data akun baru.');
  }

  public function bind($id)
  {
    $get = User::find($id);
    return $get;
  }

  public function update(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => 'required',
      'email' => 'required',
      'password' => 'required',
      'id_bidang' => 'required',
      'level' => 'required',
    ]);

    if ($validator->fails()) {
      return redirect()->route('akun.index')
        ->withErrors($validator)
        ->withInput();
    }

    $set = User::find($request->id);
    $set->name = $request->name;
    $set->email = $request->email;
    $set->password = Hash::make($request->password);
    $set->id_bidang = $request->id_bidang;
    $set->level = $request->level;
    $set->save();

    return redirect()->route('akun.index')->with('success', 'Berhasil mengubah data akun.');
  }

  public function destroy($id)
  {
    $drop = User::find($id);
    $drop->delete();

    return redirect()->route('akun.index')->with('success', 'Berhasil menghapus data akun.');
  }
}
