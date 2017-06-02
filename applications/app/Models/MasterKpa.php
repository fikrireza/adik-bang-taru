<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterKpa extends Model
{
    protected $table = 'master_kpa';

    protected $fillable = ['nip_sapk','nama','id_bidang','id_aktor','flag_status'];

    public function bidang()
    {
        return $this->belongsTo('App\Models\MasterBidang', 'id_bidang');
    }

    
}
