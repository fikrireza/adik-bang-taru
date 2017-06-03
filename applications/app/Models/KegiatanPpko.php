<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KegiatanPpko extends Model
{
    protected $table = 'adik_kegiatan_ppko';

    protected $fillable = ['kode_kegiatan','id_kegiatan','id_program','id_master_ppko','flag_status','id_user'];

    public function kegiatan()
    {
        return $this->belongsTo('App\Models\Kegiatan', 'id_kegiatan');
    }

    public function program()
    {
        return $this->belongsTo('App\Models\Program', 'id_program');
    }

    public function userPpko()
    {
        return $this->belongsTo('App\Models\MasterPpko', 'id_master_ppko');
    }
}
