<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanKpa extends Model
{
    protected $table = 'adik_kegiatan_kpa';

    protected $fillable = ['kode_kegiatan','id_kegiatan','id_program','id_master_kpa','flag_status','id_user'];

    public function kegiatan()
    {
        return $this->belongsTo('App\Models\Kegiatan', 'id_kegiatan');
    }

    public function program()
    {
        return $this->belongsTo('App\Models\Program', 'id_program');
    }

    public function userKpa()
    {
        return $this->belongsTo('App\Models\MasterKpa', 'id_master_kpa');
    }
}
