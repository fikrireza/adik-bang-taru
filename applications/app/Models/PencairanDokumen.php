<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PencairanDokumen extends Model
{
    protected $table = 'adik_pencairan_dokumen';

    protected $fillable = ['id_item_kegiatan','dok_spp','dok_spm','dok_sp2d','dok_res_kontrak','dok_syarat_kontrak',
                            'dok_npd','dok_pho','dok_kwitansi','dok_mutual','img_kegiatan','id_aktor','flag_status'];


    public function itemKegiatan()
    {
      return $this->belongsTo('App\Models\ItemKegiatan', 'id_item_kegiatan');
    }

}
