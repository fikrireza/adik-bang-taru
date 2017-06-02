<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanPptk extends Model
{
    protected $table = 'adik_kegiatan_pptk';

    protected $fillable = ['kode_kegiatan','id_kegiatan','id_program','id_master_pptk','flag_status','id_user'];

    public function kegiatan()
    {
        return $this->belongsTo('App\Models\Kegiatan', 'id_kegiatan');
    }

    public function program()
    {
        return $this->belongsTo('App\Models\Porgram', 'id_program');
    }

    public function userKpa()
    {
        return $this->belongsTo('App\Models\MasterPptk', 'id_master_pptk');
}
