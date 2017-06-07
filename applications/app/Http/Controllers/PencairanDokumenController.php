<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\KegiatanPerBidang;
use App\Models\ItemKegiatan;
use App\Models\Kegiatan;
use App\Models\Pencairan;
use App\Models\PencairanDokumen;
use App\Models\ResumeKontrak;

use Auth;
use Image;
use Validator;

class PencairanDokumenController extends Controller
{


    public function getDok($no_rek)
    {
        $getDokumen = PencairanDokumen::where('no_rekening', $no_rek)->first();

        if(!$getDokumen){
          $getDok = array(
            "no_rekening" => $no_rek,
            "dok_spp" => null,
            "dok_spm" => null,
            "dok_sp2d" => null,
            "dok_res_kontrak" => null,
            "dok_syarat_kontrak" => null,
            "dok_npd" => null,
            "dok_pho" => null,
            "dok_kwitansi" => null,
            "dok_mutual" => null
          );
        }else{
          $getDok = $getDokumen;
        }

        return $getDok;

    }


    public function store(Request $request)
    {

        $rand = rand();
        $date = date('Y-m-d');
        $pathUpload = 'dokumen/pencairan/';

        if($request->hasFile('dok_spp')){
          $file1_ = $request->file('dok_spp');
          $file1 = 'SPP'.' - '.$date.' - ' . $file1_->getClientOriginalName();
          $file1_->move($pathUpload, $file1);
        }else{
          $file1 = null;
        }

        if($request->hasFile('dok_spm')){
          $file2_ = $request->file('dok_spm');
          $file2 = 'SPM'.' - '.$date.' - ' . $file2_->getClientOriginalName();
          $file2_->move($pathUpload, $file2);
        }else{
          $file2 = null;
        }

        if($request->hasFile('dok_sp2d')){
          $file3_ = $request->file('dok_sp2d');
          $file3 = 'SP2d'.' - '.$date.' - ' . $file3_->getClientOriginalName();
          $file3_->move($pathUpload, $file3);
        }else{
          $file3 = null;
        }

        if($request->hasFile('dok_res_kontrak')){
          $file4_ = $request->file('dok_res_kontrak');
          $file4 = 'Resume Kontrak'.' - '.$date.' - ' . $file4_->getClientOriginalName();
          $file4_->move($pathUpload, $file4);
        }else{
          $file4 = null;
        }

        if ($request->file('dok_syarat_kontrak')) {
          $file5_ = $request->file('dok_syarat_kontrak');
          $file5 = 'Syarat Kontrak'.' - '.$date.' - ' . $file5_->getClientOriginalName();
          $file5_->move($pathUpload, $file5);
        } else {
          $file5 = null;
        }

        if ($request->file('dok_npd')) {
          $file6_ = $request->file('dok_npd');
          $file6 = 'NPD'.' - '.$date.' - ' . $file6_->getClientOriginalName();
          $file6_->move($pathUpload, $file6);
        } else {
          $file6 = null;
        }

        if ($request->file('dok_pho')) {
          $file7_ = $request->file('dok_pho');
          $file7 = 'PHO'.' - '.$date.' - ' . $file7_->getClientOriginalName();
          $file7_->move($pathUpload, $file7);
        } else {
          $file7 = null;
        }

        if ($request->file('dok_kwitansi')) {
          $file8_ = $request->file('dok_kwitansi');
          $file8 = 'Kwitansi'.' - '.$date.' - ' . $file8_->getClientOriginalName();
          $file8_->move($pathUpload, $file8);
        } else {
          $file8 = null;
        }

        if ($request->file('dok_mutual')) {
          $file9_ = $request->file('dok_mutual');
          $file9 = 'Mutual'.' - '.$date.' - ' . $file9_->getClientOriginalName();
          $file9_->move($pathUpload, $file9);
        } else {
          $file9 = null;
        }

        if(!$request->id_dokumen){
          $save = new PencairanDokumen;

        }else{
          $save = PencairanDokumen::findOrFail($request->id_dokumen);
        }
        $save->no_rekening = $request->no_rekening;
        $save->dok_spp = $file1;
        $save->dok_spm = $file2;
        $save->dok_sp2d = $file3;
        $save->dok_res_kontrak = $file4;
        $save->dok_syarat_kontrak = $file5;
        $save->dok_npd = $file6;
        $save->dok_pho = $file7;
        $save->dok_kwitansi = $file8;
        $save->dok_mutual = $file9;
        $save->id_aktor = Auth::user()->id;
        $save->flag_status = 0;
        $save->save();


        return redirect()->route('pencairan.proses', ['id' => $request->id_kegiatan])->with('success', 'Berhasil Upload Dokumen');

    }
}
