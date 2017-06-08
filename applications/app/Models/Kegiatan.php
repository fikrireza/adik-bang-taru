<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = "adik_kegiatan";

    public function program()
    {
        return $this->belongsTo('App\Models\Program', 'id_program');
    }

    public function itemKegiatan()
    {
        return $this->belongsTo('App\Models\ItemKegiatan', 'id_kegiatan');
    }
}
