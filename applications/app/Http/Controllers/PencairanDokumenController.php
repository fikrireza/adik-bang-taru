<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

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


    public function getDok($id)
    {
        $getDokumen = PencairanDokumen::where('id_item_kegiatan', $id)->first();

        if(!$getDokumen){
          $getDok = array(
            "id_item_kegiatan" => $id,
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


        if(!$request->id_dokumen){
          $save = new PencairanDokumen;

        }else{
          $save = PencairanDokumen::findOrFail($request->id_dokumen);
        }
        $save->id_item_kegiatan = $request->id_item_kegiatan;

          if($request->hasFile('dok_spp')){
            $file1_ = $request->file('dok_spp');
            $file1 = 'SPP'.' - '.$date.' - ' . $file1_->getClientOriginalName();
            $file1_->move($pathUpload, $file1);

            $save->dok_spp = $file1;
          }

          if($request->hasFile('dok_spm')){
            $file2_ = $request->file('dok_spm');
            $file2 = 'SPM'.' - '.$date.' - ' . $file2_->getClientOriginalName();
            $file2_->move($pathUpload, $file2);

            $save->dok_spm = $file2;
          }

          if($request->hasFile('dok_sp2d')){
            $file3_ = $request->file('dok_sp2d');
            $file3 = 'SP2d'.' - '.$date.' - ' . $file3_->getClientOriginalName();
            $file3_->move($pathUpload, $file3);

            $save->dok_sp2d = $file3;
          }

          if($request->hasFile('dok_res_kontrak')){
            $file4_ = $request->file('dok_res_kontrak');
            $file4 = 'Resume Kontrak'.' - '.$date.' - ' . $file4_->getClientOriginalName();
            $file4_->move($pathUpload, $file4);

            $save->dok_res_kontrak = $file4;
          }

          if ($request->hasFile('dok_syarat_kontrak')) {
            $file5_ = $request->file('dok_syarat_kontrak');
            $file5 = 'Syarat Kontrak'.' - '.$date.' - ' . $file5_->getClientOriginalName();
            $file5_->move($pathUpload, $file5);

            $save->dok_syarat_kontrak = $file5;
          }

          if ($request->hasFile('dok_npd')) {
            $file6_ = $request->file('dok_npd');
            $file6 = 'NPD'.' - '.$date.' - ' . $file6_->getClientOriginalName();
            $file6_->move($pathUpload, $file6);

            $save->dok_npd = $file6;
          }

          if ($request->hasFile('dok_pho')) {
            $file7_ = $request->file('dok_pho');
            $file7 = 'PHO'.' - '.$date.' - ' . $file7_->getClientOriginalName();
            $file7_->move($pathUpload, $file7);

            $save->dok_pho = $file7;
          }

          if ($request->hasFile('dok_kwitansi')) {
            $file8_ = $request->file('dok_kwitansi');
            $file8 = 'Kwitansi'.' - '.$date.' - ' . $file8_->getClientOriginalName();
            $file8_->move($pathUpload, $file8);

            $save->dok_kwitansi = $file8;
          }

          if ($request->hasFile('dok_mutual')) {
            $file9_ = $request->file('dok_mutual');
            $file9 = 'Mutual'.' - '.$date.' - ' . $file9_->getClientOriginalName();
            $file9_->move($pathUpload, $file9);

            $save->dok_mutual = $file9;
          }

        $save->id_aktor = Auth::user()->id;
        $save->flag_status = 0;
        $save->save();


        return redirect()->route('pencairan.proses', ['id' => $request->id_kegiatan])->with('success', 'Berhasil Upload Dokumen');

    }


    public function getDokRincian($id)
    {
        $getDokumen = PencairanDokumen::where('id_item_kegiatan', $id)->first();

        if(!$getDokumen){
          $getDok = array(
            "id"  => null,
            "id_item_kegiatan" => $id,
            "dok_spp" => null,
            "dok_spm" => null,
            "dok_sp2d" => null,
            "dok_res_kontrak" => null,
            "dok_syarat_kontrak" => null,
            "dok_npd" => null,
            "dok_pho" => null,
            "dok_kwitansi" => null,
            "dok_mutual" => null,
            "img_kegiatan"  => null,
          );
        }else{
          $getDok = $getDokumen;
        }

        return $getDok;

    }

    public function storeRincian(Request $request)
    {

        $rand = rand();
        $date = date('Y-m-d');
        $pathUpload = 'dokumen/pencairan/';


        if(!$request->id_dokumen){
          $save = new PencairanDokumen;

        }else{
          $save = PencairanDokumen::findOrFail($request->id_dokumen);
        }
        $save->id_item_kegiatan = $request->id_item_kegiatan;

          if($request->hasFile('dok_spp')){
            $file1_ = $request->file('dok_spp');
            $file1 = 'SPP'.' - '.$date.' - ' . $file1_->getClientOriginalName();
            $file1_->move($pathUpload, $file1);

            $save->dok_spp = $file1;
          }

          if($request->hasFile('dok_spm')){
            $file2_ = $request->file('dok_spm');
            $file2 = 'SPM'.' - '.$date.' - ' . $file2_->getClientOriginalName();
            $file2_->move($pathUpload, $file2);

            $save->dok_spm = $file2;
          }

          if($request->hasFile('dok_sp2d')){
            $file3_ = $request->file('dok_sp2d');
            $file3 = 'SP2d'.' - '.$date.' - ' . $file3_->getClientOriginalName();
            $file3_->move($pathUpload, $file3);

            $save->dok_sp2d = $file3;
          }

          if($request->hasFile('dok_res_kontrak')){
            $file4_ = $request->file('dok_res_kontrak');
            $file4 = 'Resume Kontrak'.' - '.$date.' - ' . $file4_->getClientOriginalName();
            $file4_->move($pathUpload, $file4);

            $save->dok_res_kontrak = $file4;
          }

          if ($request->hasFile('dok_syarat_kontrak')) {
            $file5_ = $request->file('dok_syarat_kontrak');
            $file5 = 'Syarat Kontrak'.' - '.$date.' - ' . $file5_->getClientOriginalName();
            $file5_->move($pathUpload, $file5);

            $save->dok_syarat_kontrak = $file5;
          }

          if ($request->hasFile('dok_npd')) {
            $file6_ = $request->file('dok_npd');
            $file6 = 'NPD'.' - '.$date.' - ' . $file6_->getClientOriginalName();
            $file6_->move($pathUpload, $file6);

            $save->dok_npd = $file6;
          }

          if ($request->hasFile('dok_pho')) {
            $file7_ = $request->file('dok_pho');
            $file7 = 'PHO'.' - '.$date.' - ' . $file7_->getClientOriginalName();
            $file7_->move($pathUpload, $file7);

            $save->dok_pho = $file7;
          }

          if ($request->hasFile('dok_kwitansi')) {
            $file8_ = $request->file('dok_kwitansi');
            $file8 = 'Kwitansi'.' - '.$date.' - ' . $file8_->getClientOriginalName();
            $file8_->move($pathUpload, $file8);

            $save->dok_kwitansi = $file8;
          }

          if ($request->hasFile('dok_mutual')) {
            $file9_ = $request->file('dok_mutual');
            $file9 = 'Mutual'.' - '.$date.' - ' . $file9_->getClientOriginalName();
            $file9_->move($pathUpload, $file9);

            $save->dok_mutual = $file9;
          }

          if($request->hasFile('img_kegiatan')){

            $files = Input::file('img_kegiatan');
            $file_count = count($files);

            if($file_count != 3){
              return redirect()->route('pencairan.rincian', ['no_rek' => $request->no_rek, 'id_keg' => $request->id_keg, 'nama_item' => $request->nama_item])->with('failed', 'Upload 3 Photo Kegiatan');
            }

            $i = 1;
            $tampung = array();
            foreach($request->file('img_kegiatan') as $file10_ )
            {
              $file10 = 'Photo Kegiatan'.' - '.$date.' - '.$i.' - '. $file10_->getClientOriginalName();
              $file10_->move($pathUpload, $file10);

              $tampung[] = $file10;
              $i++;
            }

            $img_kegiatan = implode('|', $tampung);

            $save->img_kegiatan = $img_kegiatan;
          }


        $save->id_aktor = Auth::user()->id;
        $save->flag_status = 0;
        $save->save();

        return redirect()->route('pencairan.rincian', ['no_rek' => $request->no_rek, 'id_keg' => $request->id_keg, 'nama_item' => $request->nama_item])->with('success', 'Berhasil Upload Dokumen');
    }
}
